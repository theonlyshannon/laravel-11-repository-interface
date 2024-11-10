<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD files: model, migration, controller, store request, update request,';

    public function handle()
    {
        $this->info('Creating magic... 🪄');

        $this->createModel();
        $this->createSeeder();
        $this->createController();
        $this->createRequests();
        $this->modifyMigration();
        $this->modifyRepository();
        $this->createFactory();
        $this->addRoutes();

        $this->comment('Playground created successfully');
    }

    protected function createModel()
    {
        $name = $this->argument('name');
        $this->call('make:model', ['name' => $name, '-m' => true]);

        $modelPath = app_path("Models/{$name}.php");

        $modelContent = "<?php\n\n";
        $modelContent .= "namespace App\Models;\n\n";
        $modelContent .= "use Illuminate\Database\Eloquent\Factories\HasFactory;\n";
        $modelContent .= "use Illuminate\Database\Eloquent\Model;\n";
        $modelContent .= "use Illuminate\Database\Eloquent\SoftDeletes;\n";
        $modelContent .= "use App\Traits\UUID;\n\n";
        $modelContent .= "class {$name} extends Model\n";
        $modelContent .= "{\n";
        $modelContent .= "    use HasFactory, UUID, SoftDeletes;\n\n";
        $modelContent .= "    protected \$fillable = [\n";
        $modelContent .= "        // Add your columns here\n";
        $modelContent .= "    ];\n";
        $modelContent .= "}\n";

        file_put_contents($modelPath, $modelContent);
    }

    protected function createSeeder()
    {
        $name = $this->argument('name');
        $this->call('make:seeder', ['name' => "{$name}Seeder"]);
    }

    protected function createRequests()
    {
        $name = $this->argument('name');

        $this->call('make:request', ['name' => "{$name}Request"]);

        $requestPath = app_path("Http/Requests/{$name}Request.php");

        $content =
            <<<'EOT'
            <?php

            namespace App\Http\Requests;

            use Illuminate\Foundation\Http\FormRequest;

            class __namePascalCase__Request extends FormRequest
            {
                /**
                 * Get the validation rules that apply to the request.
                 *
                 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
                 */
                public function rules(): array
                {
                    return [
                        //
                    ];
                }

                /**
                 * Get the validation attributes that apply to the request.
                 *
                 * @return array<string, string>
                 */
                public function attributes(): array
                {
                    return [
                        //
                    ];
                }

                /**
                 * Get the validation messages that apply to the request.
                 *
                 * @return array<string, string>
                 */
                public function messages(): array
                {
                    return [
                        //
                    ];
                }
            }
            EOT;

        $content = str_replace('__namePascalCase__', $name, $content);
        $content = str_replace('__nameCamelCase__', Str::camel($name), $content);
        $content = str_replace('__nameSnakeCase__', Str::snake($name), $content);
        $content = str_replace('__nameProperCase__', ucfirst(strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/', ' ', $name))), $content);
        $content = str_replace('__nameKebabCase__', Str::kebab($name), $content);
        $content = str_replace('__nameCamelCasePlurals__', Str::camel(Str::plural($name)), $content);

        file_put_contents($requestPath, $content);
    }

    protected function createController()
    {
        $name = $this->argument('name');

        $this->call('make:controller', ['name' => "Web/Admin/{$name}Controller", '--resource' => true]);

        $controllerPath = app_path("Http/Controllers/Web/Admin/{$name}Controller.php");

        $controllerContent =
            <<<'EOT'
            <?php

            namespace App\Http\Controllers\Web\Admin;

            use App\Http\Controllers\Controller;
            use App\Http\Requests\__namePascalCase__Request;
            use App\Interfaces\__namePascalCase__RepositoryInterface;
            use RealRashid\SweetAlert\Facades\Alert as Swal;
            use Illuminate\Http\Request;
            class __namePascalCase__Controller extends Controller
            {
                protected $__nameCamelCase__Repository;

                public function __construct(__namePascalCase__RepositoryInterface $__nameCamelCase__Repository)
                {
                    $this->__nameCamelCase__Repository = $__nameCamelCase__Repository;

                    $this->middleware(['permission:__nameKebabCase__-list'], ['only' => ['index', 'store']]);
                    $this->middleware(['permission:__nameKebabCase__-create'], ['only' => ['create', 'store']]);
                    $this->middleware(['permission:__nameKebabCase__-edit'], ['only' => ['edit', 'update']]);
                    $this->middleware(['permission:__nameKebabCase__-delete'], ['only' => ['destroy']]);
                }

                public function index(Request $request)
                {
                    $__nameCamelCasePlurals__ = $this->__nameCamelCase__Repository->getAll__namePascalCasePlurals__();

                    return view('pages.admin.__________.__nameKebabCase__.index', compact('__nameCamelCasePlurals__'));
                }

                public function create()
                {
                    return view('pages.admin.__________.__nameKebabCase__.create');
                }

                public function store(__namePascalCase__Request $request)
                {
                    $data = $request->validated();

                    try {
                        $this->__nameCamelCase__Repository->create__namePascalCase__($data);

                        Swal::toast('__nameProperCase__ berhasil ditambahkan', 'success');
                    } catch (\Exception $e) {
                        Swal::toast('__nameProperCase__ gagal ditambahkan', 'error');
                    }

                    return redirect()->route('admin.__________.__nameKebabCase__.index');
                }

                public function show($id)
                {
                    $__nameCamelCase__ = $this->__nameCamelCase__Repository->get__namePascalCase__ById($id);

                    return view('pages.admin.__________.__nameKebabCase__.show', compact('__nameCamelCase__'));
                }

                public function edit($id)
                {
                    $__nameCamelCase__ = $this->__nameCamelCase__Repository->get__namePascalCase__ById($id);

                    return view('pages.admin.__________.__nameKebabCase__.edit', compact('__nameCamelCase__'));
                }

                public function update(__namePascalCase__Request $request, $id)
                {
                    $data = $request->validated();

                    try {
                        $this->__nameCamelCase__Repository->update__namePascalCase__($data, $id);

                        Swal::toast('__nameProperCase__ berhasil diperbarui', 'success');
                    } catch (\Exception $e) {
                        Swal::toast('__nameProperCase__ gagal diperbarui', 'error');
                    }

                    return redirect()->route('admin.__nameKebabCase__.index');
                }

                public function destroy($id)
                {
                    try {
                        $this->__nameCamelCase__Repository->delete__namePascalCase__($id);

                        Swal::toast('__nameProperCase__ berhasil dihapus', 'success');
                    } catch (\Exception $e) {
                        Swal::toast('__nameProperCase__ gagal dihapus', 'error');
                    }

                    return redirect()->route('admin.__nameKebabCase__.index');
                }
            }
            EOT;

        $controllerContent = str_replace('__namePascalCase__', $name, $controllerContent);
        $controllerContent = str_replace('__namePascalCasePlurals__', Str::studly(Str::plural($name)), $controllerContent);
        $controllerContent = str_replace('__nameCamelCase__', Str::camel($name), $controllerContent);
        $controllerContent = str_replace('__nameSnakeCase__', Str::snake($name), $controllerContent);
        $controllerContent = str_replace('__nameProperCase__', ucfirst(strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/', ' ', $name))), $controllerContent);
        $controllerContent = str_replace('__nameKebabCase__', Str::kebab($name), $controllerContent);
        $controllerContent = str_replace('__nameCamelCasePlurals__', Str::camel(Str::plural($name)), $controllerContent);

        file_put_contents($controllerPath, $controllerContent);
    }

    protected function modifyMigration()
    {
        $name = $this->argument('name');
        $name = Str::snake($name);
        $name = Str::plural($name);
        $migration = database_path('migrations/'.date('Y_m_d_His').'_create_'.$name.'_table.php');

        $content =
            <<<'EOT'
            <?php

            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            return new class extends Migration
            {
                /**
                 * Run the migrations.
                 */
                public function up(): void
                {
                    Schema::create('__nameSnakeCase__', function (Blueprint $table) {
                        $table->uuid('id')->primary();

                        // Add your columns here


                        $table->softDeletes();
                        $table->timestamps();
                    });
                }

                /**
                 * Reverse the migrations.
                 */
                public function down(): void
                {
                    Schema::dropIfExists('__nameSnakeCase__');
                }
            };
            EOT;

        $content = str_replace('__namePascalCase__', $name, $content);
        $content = str_replace('__nameCamelCase__', Str::camel($name), $content);
        $content = str_replace('__nameSnakeCase__', Str::snake($name), $content);
        $content = str_replace('__nameProperCase__', ucfirst(strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/', ' ', $name))), $content);
        $content = str_replace('__nameKebabCase__', Str::kebab($name), $content);
        $content = str_replace('__nameCamelCasePlurals__', Str::camel(Str::plural($name)), $content);

        file_put_contents($migration, $content);
    }

    protected function modifyRepository()
    {
        $name = $this->argument('name');
        $interfacePath = app_path("Interfaces/{$name}RepositoryInterface.php");
        $repositoryPath = app_path("Repositories/{$name}Repository.php");

        $interfaceContent = $this->generateInterfaceContent($name);

        $repositoryContent = $this->generateRepositoryContent($name);

        file_put_contents($interfacePath, $interfaceContent);
        file_put_contents($repositoryPath, $repositoryContent);

        $this->updateRepositoryServiceProvider($name);
    }

    protected function createFactory()
    {
        $name = $this->argument('name');
        $factory = database_path("factories/{$name}Factory.php");

        $factoryContent = "<?php\n\n";
        $factoryContent .= "namespace Database\Factories;\n\n";
        $factoryContent .= "use Illuminate\Database\Eloquent\Factories\Factory;\n";
        $factoryContent .= "use Illuminate\Support\Str;\n\n";
        $factoryContent .= "class {$name}Factory extends Factory\n";
        $factoryContent .= "{\n";
        $factoryContent .= "    /**\n";
        $factoryContent .= "     * Define the model's default state.\n";
        $factoryContent .= "     *\n";
        $factoryContent .= "     * @return array<string, mixed>\n";
        $factoryContent .= "     */\n";
        $factoryContent .= "    public function definition(): array\n";
        $factoryContent .= "    {\n";
        $factoryContent .= "        return [\n";
        $factoryContent .= "            // Define your default state here\n";
        $factoryContent .= "        ];\n";
        $factoryContent .= "    }\n";
        $factoryContent .= "}\n";

        file_put_contents($factory, $factoryContent);
    }

    protected function generateInterfaceContent($name)
    {
        $interfaceContent =
            <<<'EOT'
            <?php

            namespace App\Interfaces;

            interface __namePascalCase__RepositoryInterface
            {
                public function getAll__namePascalCasePlurals__();

                public function get__namePascalCase__ById(string $id);

                public function create__namePascalCase__(array $data);

                public function update__namePascalCase__(array $data, string $id);

                public function delete__namePascalCase__(string $id);
            }
            EOT;

        $interfaceContent = str_replace('__namePascalCase__', $name, $interfaceContent);
        $interfaceContent = str_replace('__namePascalCasePlurals__', Str::studly(Str::plural($name)), $interfaceContent);
        $interfaceContent = str_replace('__nameCamelCase__', Str::camel($name), $interfaceContent);
        $interfaceContent = str_replace('__nameSnakeCase__', Str::snake($name), $interfaceContent);
        $interfaceContent = str_replace('__nameProperCase__', ucfirst(strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/', ' ', $name))), $interfaceContent);
        $interfaceContent = str_replace('__nameKebabCase__', Str::kebab($name), $interfaceContent);
        $interfaceContent = str_replace('__nameCamelCasePlurals__', Str::camel(Str::plural($name)), $interfaceContent);

        return $interfaceContent;
    }

    protected function generateRepositoryContent($name)
    {
        $repositoryContent =
            <<<'EOT'
            <?php

            namespace App\Repositories;

            use App\Interfaces\__namePascalCase__RepositoryInterface;
            use App\Models\__namePascalCase__;
            use Illuminate\Support\Facades\DB;

            class __namePascalCase__Repository implements __namePascalCase__RepositoryInterface
            {
                public function getAll__nameCamelCasePlurals__()
                {
                    return __namePascalCase__::all();
                }

                public function get__namePascalCase__ById(string $id)
                {
                    return __namePascalCase__::findOrFail($id);
                }

                public function create__namePascalCase__(array $data)
                {
                    DB::beginTransaction();

                    try {
                        $__nameCamelCase__ = __namePascalCase__::create($data);

                        DB::commit();

                        return $__nameCamelCase__;
                    } catch (\Exception $e) {
                        DB::rollBack();

                        return $e->getMessage();
                    }
                }

                public function update__namePascalCase__(array $data, string $id)
                {
                    DB::beginTransaction();

                    try {
                        $__nameCamelCase__ = $this->get__namePascalCase__ById($id);

                        $__nameCamelCase__->update($data);

                        DB::commit();

                        return $__nameCamelCase__;
                    } catch (\Exception $e) {
                        DB::rollBack();

                        return $e->getMessage();
                    }
                }

                public function delete__namePascalCase__(string $id)
                {
                    DB::beginTransaction();

                    try {
                        $__nameCamelCase__ = $this->get__namePascalCase__ById($id);

                        $__nameCamelCase__->delete();

                        DB::commit();

                        return $__nameCamelCase__;
                    } catch (\Exception $e) {
                        DB::rollBack();

                        return $e->getMessage();
                    }
                }
            }
            EOT;

        $repositoryContent = str_replace('__namePascalCase__', $name, $repositoryContent);
        $repositoryContent = str_replace('__nameCamelCase__', Str::camel($name), $repositoryContent);
        $repositoryContent = str_replace('__nameSnakeCase__', Str::snake($name), $repositoryContent);
        $repositoryContent = str_replace('__nameProperCase__', ucfirst(strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/', ' ', $name))), $repositoryContent);
        $repositoryContent = str_replace('__nameKebabCase__', Str::kebab($name), $repositoryContent);
        $repositoryContent = str_replace('__nameCamelCasePlurals__', Str::camel(Str::plural($name)), $repositoryContent);

        return $repositoryContent;
    }

    protected function updateRepositoryServiceProvider($name)
    {
        $repositoryServiceProvider = app_path('Providers/RepositoryServiceProvider.php');
        $repositoryServiceProviderContent = file_get_contents($repositoryServiceProvider);

        $replacement = "\$this->app->bind(\App\Interfaces\\{$name}RepositoryInterface::class, \App\Repositories\\{$name}Repository::class);\n    }\n";

        $pattern = '/public function register\(\)\s*{([^}]*)}/s';
        $repositoryServiceProviderContent = preg_replace($pattern, "public function register() {\n$1$replacement", $repositoryServiceProviderContent, 1);

        file_put_contents($repositoryServiceProvider, $repositoryServiceProviderContent);
    }

    protected function addRoutes()
    {
        $name = $this->argument('name');

        $name = Str::kebab($name);
        $routes = base_path('routes/admin.php');

        $routeContent = "\nRoute::resource('{$name}', App\Http\Controllers\Web\Admin\\{$this->argument('name')}Controller::class);";

        file_put_contents($routes, $routeContent, FILE_APPEND);
    }

}
