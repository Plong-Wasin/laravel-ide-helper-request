<?php

namespace Wasinpwg\LaravelIdeHelperExtended\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ReflectionClass;

class LaravelIdeHelperFixCommand extends Command
{
    public $signature = 'ide-helper:fix';

    public $description = 'Generate autocompletion for fix';

    public function handle()
    {
        $writeStirng = '';
        $writeStirng .= $this->fixAuth();
        $writeStirng .= $this->fixWithQueryString();
        File::put(base_path('_ide_helper_fix.php'), $writeStirng);
        $this->info('Write _ide_helper_fix.php success.');
    }

    protected function fixAuth()
    {
        $namespace = 'App\Models';

        $path = app_path('Models');
        $files = File::allFiles($path);
        $writeStirng = "<?php\n\n\n";
        foreach ($files as $file) {
            $class = $namespace.Str::of($file->getPathname())->after($path)->rtrim('.php')->replace('/', '\\');
            if (class_exists($class)) {
                $reflection = new ReflectionClass($class);
                if (! $reflection->isAbstract() && $reflection->isSubclassOf('Illuminate\\Foundation\\Auth\\User')) {
                    $writeStirng .= <<<TEXT
namespace Illuminate\\Contracts\\Auth {
/**
 * Fix auth
 */          
  class Authenticatable extends \\$class {}
}


TEXT;
                }
            }
        }

        return $writeStirng;
    }

    protected function fixWithQueryString()
    {
        $write = <<<TEXT
namespace Illuminate\Contracts\Pagination{
/**
 * Fix pagination
 */
  class LengthAwarePaginator extends \Illuminate\Pagination\LengthAwarePaginator{}
}


TEXT;

        return $write;
    }
}
