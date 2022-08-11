# dominaTest

# Requerimientos minimos
- Composer
- PHP 7.4
- XAMPP o WAMP

# Instalación
- Clonar el repositorio
    ```bash
        git clone https://github.com/andresfmaldonado/dominaTest.git
    ```
- Instalar las dependencias de composer
    ```bash
        cd dominaTest
        composer install
        composer dump-autoload
    ```
- Crear archivo .htaccess en la raiz del projecto y pegar la configuracion de este documento
- Levantar servicio de xampp o wamp

# Configuracion .htaccess
```htaccess
<IfModule mod_rewrite.c>
RewriteEngine On

# Stop processing if already in the /public directory
RewriteRule ^public/ - [L]

# Static resources if they exist
RewriteCond %{DOCUMENT_ROOT}/public/$1 -f
RewriteRule (.+) public/$1 [L]

# Route all other requests
RewriteRule (.*) public/index.php?route=$1 [L,QSA]
</IfModule>
```

# Modulos

La aplicacion cuenta con 5 modulos:
- First Step
- Second Step
- Third Step
- Fourth Step
- Fifth Step

Cada uno llevará al formulario que corresponde segun el item del ejercicio propuesto.



