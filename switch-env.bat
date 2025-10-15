@echo off
echo ===============================================
echo SWITCHER DE ENTORNO - AlbinoL
echo ===============================================
echo.
echo 1. Cambiar a DESARROLLO (localhost)
echo 2. Cambiar a PRODUCCION (servidor)
echo 3. Salir
echo.
set /p choice="Selecciona una opcion (1-3): "

if "%choice%"=="1" goto desarrollo
if "%choice%"=="2" goto produccion
if "%choice%"=="3" goto salir
goto menu

:desarrollo
echo.
echo Cambiando a modo DESARROLLO...
if exist .htaccess.backup (
    del .htaccess.backup
)
if exist .htaccess (
    ren .htaccess .htaccess.backup
)
if exist .htaccess.localhost (
    ren .htaccess.localhost .htaccess
    echo ✓ Configuracion de desarrollo activada
    echo ✓ Redirecciones HTTPS deshabilitadas
    echo ✓ Caché reducido para desarrollo
) else (
    echo ✗ Error: No se encontro .htaccess.localhost
)
goto salir

:produccion
echo.
echo Cambiando a modo PRODUCCION...
if exist .htaccess.backup (
    del .htaccess
    ren .htaccess.backup .htaccess
    echo ✓ Configuracion de produccion activada
    echo ✓ Redirecciones HTTPS habilitadas
    echo ✓ Caché optimizado para produccion
) else (
    echo ✗ Error: No se encontro .htaccess.backup
)
goto salir

:salir
echo.
echo Presiona cualquier tecla para continuar...
pause >nul
