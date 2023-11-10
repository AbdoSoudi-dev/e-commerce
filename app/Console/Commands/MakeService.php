<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-service {service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new service';

    /**
     * The service name to create.
     *
     * @var string
     */
    protected string $service;

    /**
     * Execute the console command.
     */
    public function handle() : void
    {
        $this->service = ucfirst($this->argument('service'));
        $this->createServiceFile();
        $this->createContractFile();
        $this->createRepositoryFile();
        $this->createFacadeFile();

    }

    private function createServiceFile() : void
    {
        $service = $this->service . "Service";
        $namespace = "App\\Services\\{$this->service}";
        $template = str_replace(
            ['{{namespace}}', '{{class}}'],
            [$namespace, $service],
            file_get_contents(__DIR__ .'/stubs/Service.stub')
        );

        $path = app_path("Services/{$this->service}");
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true);
        }

        file_put_contents($path.'/'.$service.'.php', $template);
        $this->info('Created Service: ' . $path.'/'.$service.'.php');
    }

    private function createContractFile() : void
    {
        $serviceContract = $this->service . "Contract";
        $namespace = "App\\Services\\{$this->service}\\Contracts";
        $template = str_replace(
            ['{{namespace}}', '{{class}}'],
            [$namespace, $serviceContract],
            file_get_contents(__DIR__ .'/stubs/ServiceContract.stub')
        );

        $path = app_path("Services/{$this->service}/Contracts");
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true);
        }

        file_put_contents($path.'/'.$serviceContract.'.php', $template);
        $this->info('Created Service Contract: ' . $path.'/'.$serviceContract.'.php');
    }



    private function createRepositoryFile() : void
    {
        $repository = $this->service . "Repository";
        $contract = $this->service . "Contract";
        $serviceContractUse = "App\\Services\\{$this->service}\\Contracts\\{$contract}";
        $namespace = "App\\Services\\{$this->service}\\Repositories";
        $template = str_replace(
            ['{{namespace}}', '{{class}}', '{{contract}}', '{{serviceContract}}'],
            [$namespace, $repository, $contract, $serviceContractUse],
            file_get_contents(__DIR__ .'/stubs/ServiceRepository.stub')
        );

        $path = app_path("Services/{$this->service}/Repositories");
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true);
        }

        file_put_contents($path.'/'.$repository.'.php', $template);
        $this->info('Created Service Repository: ' . $path.'/'.$repository.'.php');
    }

    private function createFacadeFile() : void
    {
        $namespace = "App\\Services\\{$this->service}\\Facades";
        $template = str_replace(
            ['{{namespace}}', '{{class}}', '{{service}}'],
            [$namespace, $this->service, $this->service."Service"],
            file_get_contents(__DIR__ .'/stubs/ServiceFacade.stub')
        );

        $path = app_path("Services/{$this->service}/Facades");
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true);
        }

        file_put_contents($path.'/'.$this->service.'.php', $template);
        $this->info('Created Service Facade: ' . $path.'/'.$this->service.'.php');
    }

}
