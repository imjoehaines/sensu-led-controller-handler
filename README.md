# Sensu LED Controller Handler

## Setup

- Setup an instance of [Sensu LED Controller](https://github.com/imjoehaines/sensu-led-controller)
- `composer install`
- `cp .env.example .env`
- Add your LED API URL to `.env`
- Set up the handler on your sensu-server

## Usage

Pipe stuff to it like any other Sensu handler:

```sh
cat example.json | php handler.php
```

*NB* currently only handles a single line of input
