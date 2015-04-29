#!/bin/bash
# To use this script, give it user execute permissions : sudo chmod u+rwx install, 
set -o errexit
# Exit on any errors and don't continue processing.

mkdir www/wp-content/uploads/
sudo chown www-data:www-data www/wp-content/uploads/
