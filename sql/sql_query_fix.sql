use sql_query_fix;

create table if not exists author
(
    id         int unsigned auto_increment
    primary key,
    first_name varchar(50) not null,
    last_name  varchar(50) not null
    );

create table if not exists book
(
    id        int unsigned auto_increment
    primary key,
    name      varchar(50) not null,
    isbn10    char(13) not null,
    author_id int unsigned not null,
    constraint book_ibfk_1
    foreign key (author_id) references author (id)
    );

INSERT IGNORE INTO author (id, first_name, last_name) VALUES (1675, 'Zaria', 'Barton');

INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (3326, 'Est aperiam.', '8830161489', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (3327, 'Accusantium quia.', '3679509375', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (8649, 'Tempora dolores et.', '0797121986', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (22943, 'Occaecati aut in.', '7482383522',  1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (24583, 'Quidem facilis odit.', '4758194009', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (25146, 'Voluptates ut.', '2154230628', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (25310, 'Et iusto facere vel.', '9573912252', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (27888, 'Magni et ut.', '1667543172', 1675);

# select author.id, first_name, last_name, count(author.id) as book_count
                                                                     # from author
                                                                                # where author.id in
#       (select author_id
#        from book
#        where author.first_name = 'Zaria'
#          and author.last_name = 'Barton')
# group by author.id;

select first_name, last_name, count(book.id) as book_count
from author
         inner join book on author.id = book.author_id
where first_name = 'Zaria' and last_name = 'Barton'
group by first_name, last_name
;