<?php

namespace Wasinpwg\LaravelIdeHelperExtended\Commands;

use ReflectionClass;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LaravelIdeHelperRequestsCommand extends Command
{
    public $signature = 'ide-helper:requests';

    public $description = 'Generate autocompletion for requests';

    public function handle(): int
    {
        $namespace = 'App\Http\Requests';

        $path = app_path('Http/Requests');
        $files = File::allFiles($path);
        $writeStirng = "<?php\n\n\n";
        foreach ($files as $file) {
            $class = $namespace . Str::of($file->getPathname())->after($path)->rtrim(".php")->replace('/', '\\');
            if (class_exists($class)) {
                $reflection = new ReflectionClass($class);
                if (!$reflection->isAbstract()) {
                    $classInstance = new $class();
                    try {
                        $rules = (new $classInstance())->rules();
                        $keys = array_filter((array_keys($rules)),
                            function ($key) {
                                return !str_contains($key, '.*');
                            }
                        );
                        $namespaceClass = Str::beforeLast($class, '\\');
                        $propertyKeys = array_map(function ($key) use ($rules) {
                            $keyTypes = [];
                            $rule = $rules[$key];
                            if (is_string($rule)) {
                                $rule = explode("|", $rule);
                            }
                            $types = [
                                'integer' => ['integer'],
                                'string' => ['string'],
                                'array' => ['array'],
                                'boolean' => ['boolean'],
                                'nullable' => ['null'],
                                'numeric' => ['integer', 'float', 'string']
                            ];
                            $isRequired = false;
                            foreach ($types as $type => $typeValue) {
                                foreach ($rule as $ruleType) {
                                    if (!is_string($ruleType)) {
                                        continue;
                                    }
                                    if (trim($ruleType) === 'required') {
                                        $isRequired = true;
                                    }
                                    if ($type === $ruleType) {
                                        $keyTypes = array_merge($keyTypes, $typeValue);
                                    }
                                }
                            }
                            if (!$keyTypes) {
                                $keyTypes = ['mixed'];
                            } elseif (!$isRequired) {
                                $keyTypes[] = 'null';
                            }
                            $keyType = implode('|', $keyTypes);
                            return " * @property $keyType $key";
                        }, $keys);
                        $className = Str::afterLast($class, '\\');
                        $propertyKey = implode("\n", $propertyKeys);
                        $writeStirng .= <<<TEXT
namespace $namespaceClass {          
/**
 * $class
$propertyKey
 */
  class $className extends \Illuminate\Foundation\Http\FormRequest {}
}


TEXT;
                    } catch (\Exception $e) {
                        $this->warn("Skip $class: {$e->getMessage()}");
                    }
                }
            }
        }
        File::put(base_path('_ide_helper_request.php'), $writeStirng);
        $this->info('Write _ide_helper_request.php success.');

        return self::SUCCESS;
    }
}
