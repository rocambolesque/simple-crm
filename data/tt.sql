-- Tables

CREATE TABLE address (
    id integer PRIMARY KEY AUTOINCREMENT,
    enabled integer DEFAULT 1 NOT NULL,
    company_id integer NOT NULL,
    address text NOT NULL,
    zip text NOT NULL,
    city text NOT NULL
);
CREATE INDEX address_id_idx ON address(id);
CREATE INDEX address_company_id_idx ON address(company_id);

CREATE TABLE company (
    id integer PRIMARY KEY AUTOINCREMENT,
    enabled integer DEFAULT 1 NOT NULL,
    name text NOT NULL,
    description text NOT NULL,
    phone text NOT NULL,
    fax text NOT NULL,
    website text NOT NULL
);
CREATE INDEX company_id_idx ON company(id);
CREATE INDEX company_name_idx ON company(name);

CREATE TABLE person (
    id integer PRIMARY KEY AUTOINCREMENT,
    enabled integer DEFAULT 1 NOT NULL,
    company_id integer NOT NULL,
    gender integer NOT NULL,
    name text NOT NULL,
    description text NOT NULL,
    email text NOT NULL,
    homephone text NOT NULL,
    workphone text NOT NULL,
    cellphone text NOT NULL
);
CREATE INDEX person_id_idx ON person(id);
CREATE INDEX person_name_idx ON person(name);

CREATE TABLE ref_gender (
    id integer PRIMARY KEY AUTOINCREMENT,
    enabled integer DEFAULT 1 NOT NULL,
    value text NOT NULL
);

CREATE TABLE ref_comm (
    id integer PRIMARY KEY AUTOINCREMENT,
    enabled integer DEFAULT 1 NOT NULL,
    value text NOT NULL
);

-- Data for ref_gender
INSERT INTO ref_gender VALUES (1001, 1, 'Monsieur');
INSERT INTO ref_gender VALUES (1002, 1, 'Madame');
INSERT INTO ref_gender VALUES (1003, 1, 'Mademoiselle');

-- Data for ref_comm
INSERT INTO ref_comm VALUES (2001, 1, 'Email');
INSERT INTO ref_comm VALUES (2002, 1, 'Domicile');
INSERT INTO ref_comm VALUES (2003, 1, 'Bureau');
INSERT INTO ref_comm VALUES (2004, 1, 'Mobile');
INSERT INTO ref_comm VALUES (2005, 1, 'Fax');

-- Data for company
INSERT INTO company VALUES (1100001, 1, 'MeilleursAgents.com', '', '', '', 'http://www.meilleursagents.com');
INSERT INTO company VALUES (1100002, 1, 'Microsoft', '', '', '', 'http://www.microsoft.com');
INSERT INTO company VALUES (1100003, 1, 'Apple', '', '', '', 'http://apple.com');

-- Data for address
INSERT INTO address VALUES (1200001, 1, 1100001, '33 rue des jeuneurs', '75002', 'Paris');
INSERT INTO address VALUES (1200002, 1, 1100002, '', '', 'Seattle');
INSERT INTO address VALUES (1200003, 1, 1100002, '1 Infinite loop drive', '', 'Cuppertino');

-- Data for person
INSERT INTO person VALUES (1300001, 1, 1100001, 1001, 'Julien Cheyssial', '', 'julien@meilleursagents.com', '', '', '');
INSERT INTO person VALUES (1300002, 1, 1100001, 1001, 'Yoann Aubineau', '', 'yoann@meilleursagents.com', '', '', '');
INSERT INTO person VALUES (1300003, 1, 1100001, 1001, 'Jonathan Camile', '', 'jonathan@meilleursagents.com', '', '', '');
INSERT INTO person VALUES (1300004, 1, 1100001, 1001, 'Nicolas Mussat', '', 'nicolas@meilleursagents.com', '', '', '0620257153');
INSERT INTO person VALUES (1300005, 1, 1100002, 1001, 'Steve Ballmer', '', 'steveb@microsoft.com', '', '', '');
INSERT INTO person VALUES (1300007, 1, 1100003, 1001, 'Steve Jobs', '', 'steve@apple.com', '', '', '');
INSERT INTO person VALUES (1300008, 1, 1100003, 1001, 'Jonathan Ives', '', 'jonny@apple.com', '', '', '');


