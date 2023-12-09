#!/usr/bin/env bash

set -euo pipefail

[[ $(ps -p 1 | tail -n +2 | awk '{print $4}') == "php-fpm" ]] || exit 1
