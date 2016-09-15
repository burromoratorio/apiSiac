@servers(['server' => 'siacadmin@wspuertos.siacseguridad.com'])

@setup
    $project = "wspuertos";
@endsetup

@task('init', ['on' => 'server'])

    cd /var/www/
    git clone git@gitserver.siacseguridad.com:/var/git/sistemas/{{ "$project" }}.git
    cd {{ "$project" }}
    chmod -R ugo+w storage bootstrap/cache
    ln -s .env.produccion .env
    composer install --no-dev

@endtask

@task('deploy', ['on' => 'server'])

    cd /var/www/{{ "$project" }}
    git fetch origin master
    echo "--- Se instalan/actualizan dependencias (composer) ---"
    git merge origin master
    composer install --no-dev

@endtask
