# Client Management System

## Build

[![Build Status](https://travis-ci.org/basanta123/client-management-system.svg?branch=master)](https://travis-ci.org/basanta123/client-management-system)


## Code Quality

[![Code Climate](https://codeclimate.com/repos/56db22a9b86182796c010820/badges/f5521d15de565dc9566e/gpa.svg)](https://codeclimate.com/repos/56db22a9b86182796c010820/feed)

## Code Style

[![StyleCI](https://styleci.io/repos/52873783/shield)](https://styleci.io/repos/52873783)

##Description

A simple application that takes the client data as an input from the form ,saves it in a CSV file and displays the client data from CSV file.The datas of the client are:


    1.Name
    2.Gender
    3.Phone
    4.Email
    5.Address
    6.Nationality
    7.Date of birth
    8.Education background
    9.Preferred mode of contact 

    [Demo](http://clientmanagement-apilaravel.rhcloud.com/).
    

## Framework

Laravel,Angular Js and  Bootstrap

## Application Logs

Monolog library inbuilt with laravel,Log entries.com for the entry of logs into the cloud

## Core package

League/csv to read and write csv data

## Unit test

PHPUNIT

## Deployment

This application is deployed to the openshift.The deployment process is:
1.Login to the openshift,Create a new HHVM application.
2.Application clone code is given after successfully created the application.
3.Clone the application with that code into the local working directory
4.Copy the laravel application code into the directory just cloned.
5.edit NGINX server config file , which is located at config/nginx.d/default.conf.erb

Change:

root              <%= ENV['OPENSHIFT_REPO_DIR'] %><%= ENV['NGINX_WWW_ROOT'] %>;

To:

root              <%= ENV['OPENSHIFT_REPO_DIR'] %>public;


change:

    location / {

        try_files $uri $uri/ =404;
    }

To:

location / {

  try_files $uri $uri/ /index.php?$query_string;
 }
6.Finally commit the changes and push
note:One should remove /vendor directory and .env file from git ignore

