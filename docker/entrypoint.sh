#!/usr/bin/env bash

set -eux

php artisan octane:frankenphp --watch --host=localhost --port=443 --admin-port=2019 --https