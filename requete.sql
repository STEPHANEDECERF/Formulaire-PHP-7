INSERT INTO
    `76_users` (
        `user_lastname`,
        `user_firstname`,
        `user_pseudo`,
        `user_gender`,
        `user_birthdate`,
        `user_mail`,
        `user_password`,
        `user_activated`
    )
VALUES
    (
        'Decerf',
        'Stephane',
        'Stan',
        'homme',
        '1972-10-24',
        'fafane@gmail.com',
        'tamtam72',
        1
    );


    -- recherche user pseudo
    
    SELECT * FROM `76_users` WHERE user_pseudo = 'ghghff';

-- recherche utilisateur user pseudo ou user_mail

    SELECT * FROM `76_users` 
WHERE user_pseudo = 'ghghff' OR `user_mail`= 'ghghff'

SELECT `user_id`,`post_id`,`post_timestamp`,`post_description`,`pic_id`,`user_pseudo`,`user_avatar` FROM `76_posts` 
NATURAL JOIN 76_pictures
NATURAL JOIN 76_users
WHERE `post_id`= 4