# Basic Async Symfony Messenger Example

This is just a basic example of how Symfony Messenger can be used to run things asynchronously. With that example, you should be able to run any shell command in async.

## Installation

Use the package manager [composer](https://getcomposer.org/) to install dependencies. You should have at least PHP7.4

```bash
composer install
```

Then you need to create your db(to store results of the commands you ran) with these commands:

```bash
./bin/console doctrine:database:create
./bin/console doctrine:schema:create
```

## Usage

To consume messages:

```bash
./bin/console messenger:consume
```

To run web server:

```bash
symfony serve
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)