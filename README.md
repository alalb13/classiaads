Classiads App. Backend part.
The views were created to test for correct operation.
The App contains a registration part per user.
Each user can publish their ad with only one image.
Each user can choose the category of the ad.
Each user has their own Dashboard to edit or delete ads.
The Home can be viewed without registering and contains announcements from all users.
If a user opens his own ad from the Home, he will still be able to view the buttons (edit and delete).

I hope it will be useful.

Created by Alessandro Albergo

Installation 

copy .env.example
Paste env.example as .env
set your DB on .env with user and password
npm install
npm run dev
npm run prod
php artisan migrate
php artisan serve

enjoy!

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)
