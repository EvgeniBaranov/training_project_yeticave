INSERT INTO categories (name_category, code)
VALUES
    ('Доски и лыжи', 'boards'),
    ('Крепления', 'attachment'),
    ('Ботинки', 'boots'),
    ('Одежда', 'clothing'),
    ('Инструменты', 'tools'),
    ('Разное', 'other');

INSERT INTO users (user_name, user_email, user_password, contacts)
VALUES
    ('test1', 'test1@email.com', '123456', 'cats'),
    ('test2', 'test2@email.com', '654321', 'dogs');

INSERT INTO lots (order_date, title, about, img, start_price, completion_date, step, category_id)
VALUES
    (NOW(), '2014 Rossignol District Snowboard', 'abc', 'uploads/lot-1.jpg', '10999', '2022-12-03', '100', '1'),
    (NOW(), 'DC Ply Mens 2016/2017 Snowboard', 'abc', 'uploads/lot-2.jpg', '159999', '2022-11-30', '100', '1'),
    (NOW(), 'Крепления Union Contact Pro 2015 года размер L/XL', 'abc', 'uploads/lot-3.jpg', '8000', '2022-12-01', '100', '2'),
    (NOW(), 'Ботинки для сноуборда DC Mutiny Charocal', 'abc', 'uploads/lot-4.jpg', '10999', '2022-11-21', '100', '3'),
    (NOW(), 'Куртка для сноуборда DC Mutiny Charocal', 'abc', 'uploads/lot-5.jpg', '7500', '2022-11-10', '100', '4'),
    (NOW(), 'Маска Oakley Canopy', 'abc', 'uploads/lot-6.jpg', '5400', '2022-12-30', '100', '6');

INSERT INTO bets (bet_price, user_id, lot_id)
VALUES
    ('12000', '1', '1'),
    ('10000', '1', '3'),
    ('6500', '2', '6');