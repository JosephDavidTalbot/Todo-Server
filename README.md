# Todo Server

## What Is This

Todo Server is a toy program that uses CodeIgniter and SQLite to store users and their to-do lists, and then emails them to remind them of their tasks.

## Why Is This

It's been a while since I touched CodeIgniter, and CodeIgniter has moved on to its fourth major version in the meantime. I figured, now that I was out of college, but still unemployed, now was a perfect time to do a quick little hobby project to brush up on my skills.

Well, that and my friend Tim- great guy, love 'im to bits- suggested it, and I didn't have any good arguments to *not* do this. So, here we are.

## Setup Process

1. Pick a server to host this on. I used a Raspberry Pi 4, because that's what I had handy.
2. Go through the customary process to prepare your server to host CodeIgniter. There are plenty of guides for this, and I cannot do a better job than they have. CodeIgniter's own userguide can be found [here](https://codeigniter4.github.io/userguide/).
3. Upload this repository to the root of your CodeIgniter environment.
4. Create a blank file titled `login_db.sqlite` in the root of your CodeIgniter environment, and then, using the SQLite tool of your choice, run the following query:
`CREATE TABLE users(
    user_id INTEGER PRIMARY KEY,
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    user_password VARCHAR(200),
    user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)`
This file is not included as a security feature. Do not put your login database on github.
5. Smoke Test, and enjoy.

## Credits

I used [this tutorial](https://mfikri.com/en/blog/codeigniter4-login-register) to put together the login functionality.
