REM ------------------------------------------------
REM Batch-file to create theme-package for wordpress
REM ------------------------------------------------
@echo off
title Create Wordpress-Theme for Jusos-Blog
REM change these values if needed
set zip="%PROGRAMFILES%\7-Zip\7z.exe"
set dirname=jusos-blog
set dstdir=theme
cls
REM Change to other drive if needed
echo Changing used drive to %~d0
%~d0
REM Change directory to path where script is located
echo Changing directory to %~dp0
cd "%~dp0"
REM compress directory to wordpress format with subfolder (jusos-blog.zip > jusos-blog > [ALL FILES])
echo Adding jusos-blog to archive
%zip% a "%dstdir%\%dirname%-2017.zip" "%dirname%"
echo Wordpress-Theme successfully created
timeout 3