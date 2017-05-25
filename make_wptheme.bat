@echo off
title Create Wordpress-Theme for Jusos-Blog
set zip="%PROGRAMFILES%\7-Zip\7z.exe"
set dirname=jusos-blog
cls
echo Changing used drive to %~d0
%~d0
echo Changing directory to %~dp0
cd "%~dp0"
echo Adding jusos-blog to archive
%zip% a "%dirname%-2017".zip "%dirname%"
echo Wordpress-Theme successfully created
timeout 3