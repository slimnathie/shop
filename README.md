# Shop Market Place #
----

## Pre-Req ##

* PHP v8.1+
* Composer

## Use Case Scenario: Online Marketplace

Requirements have surfaced for an online marketplace; a key requirement is that users can browse and shop for various items based on the following:

"As a user, I require the capability to register and log in to the marketplace. This will enable me to explore the range of product items available, with the primary intention of adding items to my shopping basket and removing them as needed."

## Tasks

- User Authentication: Allow users to register and log in.

- Item Listing: Display a list of items available on the marketplace. Each item should have a name, description, and price.
Basket Feature:
  
- Allow logged-in users to add items to their basket.

- Users should be able to view items in their basket.

- Provide an option for users to remove items from the basket.

## Installation

1. Clone the repo
```
https://github.com/slimnathie/shop.git
``` 

2. Run `cp .env.example .env` to get env variables

3. Run `composer install` to get dependencies

4. Run migrations `php artisan migrate`

5. Generate application key

php artisan key:generate

6. Install npm

npm install && npm run dev

## Unit Testing

run `php artisan test`

