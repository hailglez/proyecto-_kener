@echo off
title Backup Mysql
cls
color 17
Echo Backup de base de datos.
echo ___________________________
echo.
:: seteo de la fecha y la hora
set Dia=%Date:~0,2%
set Mes=%Date:~3,2%
set Anio=%Date:~6,4%
set Hora= %Time:~0,2%
set Minutos=%Time:~3,2%
set Segundos=%Time:~6,2%
:: usuario db
set dbuser=root
:: Password de user
set dbpass=Soporte01
:: Database
set database= caaz

rem MM/DD/YYYY
set Archivo=%database%_%Mes%-%Dia%-%Anio%_%Hora%_%Minutos%_%Segundos% .sql

:: MySQL EXE Path
set mysqldumpexe=C:\xampp\mysql\bin\mysqldump.exe
:: MySQL EXE Pathbackup
set backupfolder=c:\Users\hail.gonzalez\Desktop
:: Opciones 
set opciones= --single-transaction --set-gtid-purged=OFF --add-drop-database --triggers --routines --events
:: Ejecuta la la sentencia
 %mysqldumpexe% %opciones% -u %dbuser% -p%dbpass% %database% > %backupfolder%%Archivo%
echo ________________________________________________________________
echo.
echo Se realizo el backup de la base de datos: [%database%]
echo.
echo Nombre del archivo de backup: [%Archivo%]
echo.
echo ubicado en [%backupfolder%]
echo.
echo ________________________________________________________________