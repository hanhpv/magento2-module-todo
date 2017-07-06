# magento2-module-todo
Magento 2 Todo module for training.

This module covers most of the aspects of Magento 2 in a sample todo app, which will help you have a basic understanding on:

* create and register a Magento 2 module
* create module controllers
* create module models
* create module helpers
* create the admin grid and form to perform CRUD operations
* use setup scripts to update the database
* use xml layout to display data on frontend
* how to use KnockoutJS

# Installation
The simplest way is to download the source code and copy to the `app/code/Hans` directory.
### Using composer
The better way is to use composer. Add these lines to the `repositories` property of your project `composer.json`

```
"repositories": [
    {
      "type": "composer",
      "url": "https://repo.magento.com/"
    },
    {
      "type": "vcs",
      "url": "git@github.com:hanhpv/magento2-module-todo.git",
      "no-api": true
    }
]
```

and run this command: `composer require hans/module-todo:dev-master`

The module will be disable by default. We need to tell Magento to enable it. Run these commands from the Magento doc root:

`php bin/magento module:enable Hans_Todo`
`php bin/magento cache:clean`
`php bin/magento setup:upgrade`

You should be all set.

