@servers(['aws' => '-i ~/curso-envoy-aws.pen ubuntu@3.16.13.217'])
@servers(['aws' => '-i / ubuntu@3.16.13.217'])
@include('vendor/autoload.php')


@setup
$origin = 'git@github.com:JDBYTE/curso-envoy';
$branch = isset($branch) ? $branch : 'master';
$app_dir = '/var/www/html/curso-envoy';
if( !isset($on)){
throw  new Exception('La variable --on no esta definida');
}
@endsetup


@task('git:clone',['on' => $on])
   cd {{ $app_dir }}
   echo "Hemos entrado al directorio /var/www/html";
   git clone {{ $origin }} ;
   echo "Repositorio clonado correctamente";
@endtask


@task('git:pull', ['on' => $on])
        cd {{ $app_dir }}
        echo("Hemos entrado en el directorio {{ $app_dir }}");
        git pull origin {{ $branch }}
        echo "Codigo actualizado correctamente ";
@endtask




@task('ls',['on' => $on])
cd {{ $app_dir }}
ls -la 
@endtask



@task('composer:install', ['on' => $on])
        cd {{ $app_dir }}
        composer install
@endtask



@task('key:generate', ['on' => $on])
cd {{ $app_dir }}
php artisan key:generate
@endtask