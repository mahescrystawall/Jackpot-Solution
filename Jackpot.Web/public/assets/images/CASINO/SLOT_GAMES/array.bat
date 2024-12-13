@echo off

:: Directory to scan is the same as the batch file location
set "directory=%~dp0"

:: Start building the PHP array
echo ^<?php> output.php
echo. >> output.php
echo $files = [ >> output.php

:: Loop through files in the directory
for %%F in ("%directory%\*.*") do (
    echo    "%%~nxF", >> output.php
)

:: Close the PHP array
echo ]; >> output.php
echo. >> output.php
echo ^?> >> output.php

echo PHP array saved to output.php
