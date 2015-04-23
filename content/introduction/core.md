# Streams Platform <small>The power house core of PyroCMS and other related products.</small>

The Streams Platform is a composer package that lays the foundation for PyroCMS and other related products. It handles the vast majority of services, automation and standardization that makes PyroCMS so great and supports all of it's addons.

* {{ docs:id_link title="Why use a common core?" }}
* {{ docs:id_link title="What exactly does it do?" }}
* {{ docs:id_link title="So what does PyroCMS do?" }}


## Why use a common core?

The Streams Platform is currently the core package of two related products; PyroCMS and Streams. PyroCMS is of course the CMS that you all know and love and Streams is a bare bones version of PyroCMS. 

So why a common core? We believe that more products will want to harness the services and addon capabilities for their Laravel 5 products too. In fact, we have plans for 2 more products in the very near future that both heavily leverage the Stream Platform.

By building your product using the Streams Platform you instantly inherit a tried and true suite of utilities and concepts that will turbo charge the development, maintainability and stability of your product.

Another benefit of a common core is that any product built with the Streams Platform can use ***any*** addon, even if originally released or intended for a different product. Any Streams Platform addon can be used for any Streams Platform product.


## What exactly does it do?

The Streams Platform is actually responsible for most of PyroCMS's lower level tasks. The services and development sections of this documentation are technically about the Streams Platform since it is directly responsible for providing those features.

The Streams Platform is responsible for everything from booting your application up with Laravel, rendering tables and forms, using assets / images and registering addons for your application. The Streams Platform is packaged with the entire Streams API and services and also includes other popular 3rd party packages to assist you in development, design and using the product.


## So what does "PyroCMS" do?

PyroCMS is a distribution of the Streams Platform and various addons. PyroCMS is simply 1.) the Streams Platform, 2.) the admin theme, and 3.) preloaded addons designed specifically for building and maintaining **websites**. The pages, blog, files and navigation modules are just a handful of examples of modules specifically designed for the purpose of running a website.

PyroCMS used to come in community and pro versions, each with slightly different code bases. Today PyroCMS and it's available versions is ***only*** defined by what the product comes packaged with. The code base is exactly the same, only different addons.

Going forward PyroCMS will continue to streamline the process of building and managing websites for developers, designers and users. If you would like to build something atypical like an application API and still use the power of Streams Platform, perhaps just use the Streams product version. Streams comes stripped of most addons and includes only what is necessary to run. You can then include or build addons as needed.
