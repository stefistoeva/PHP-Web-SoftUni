CREATE TABLE IF NOT EXISTS users (
  'id' INT not null auto_increment,
  'username' varchar(255) not null,
  'password' varchar(255) not null,
  'first_name' varchar(255) not null,
  'last_name' varchar(255) not null,
  'born_on' timestamp not null,
  primary key ('id')
)
collate ='utf8_general_ci'
engine=InnoDb
