# PHP + Rabbitmq
## Getting Started
### Setup
    #composer install
    #lando start
## Sending a message
    Send a message to a queue
    #send.php "message content" "routing-key"
## Receiving a message
    Send a message to a queue
    #send.php "message content" "routing-key"
## Running Rabbitmq Commands
    #lando rabbit command_name
    #lando rabbit list_queues
### References:
- https://www.rabbitmq.com/tutorials/tutorial-one-php.html
- https://github.com/FacetInteractive/mautic-k8s/blob/master/.lando.yml