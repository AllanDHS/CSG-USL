#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: categories_equipes
#------------------------------------------------------------

CREATE TABLE categories_equipes(
        cat_id   Int  Auto_increment  NOT NULL ,
        cat_name Varchar (50) NOT NULL
	,CONSTRAINT categories_equipes_PK PRIMARY KEY (cat_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: equipes
#------------------------------------------------------------

CREATE TABLE equipes(
        equ_id   Int  Auto_increment  NOT NULL ,
        equ_name Varchar (50) NOT NULL ,
        equ_logo Varchar (50) NOT NULL ,
        cat_id   Int NOT NULL
	,CONSTRAINT equipes_PK PRIMARY KEY (equ_id)

	,CONSTRAINT equipes_categories_equipes_FK FOREIGN KEY (cat_id) REFERENCES categories_equipes(cat_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: competitions
#------------------------------------------------------------

CREATE TABLE competitions(
        com_id   Int  Auto_increment  NOT NULL ,
        com_name Varchar (50) NOT NULL
	,CONSTRAINT competitions_PK PRIMARY KEY (com_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: matchs
#------------------------------------------------------------

CREATE TABLE matchs(
        mat_id    Int  Auto_increment  NOT NULL ,
        mat_date  Date NOT NULL ,
        mat_place Varchar (50) NOT NULL ,
        com_id    Int NOT NULL
	,CONSTRAINT matchs_PK PRIMARY KEY (mat_id)

	,CONSTRAINT matchs_competitions_FK FOREIGN KEY (com_id) REFERENCES competitions(com_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: album
#------------------------------------------------------------

CREATE TABLE album(
        alb_id   Int  Auto_increment  NOT NULL ,
        alb_name Varchar (50) NOT NULL
	,CONSTRAINT album_PK PRIMARY KEY (alb_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: photos
#------------------------------------------------------------

CREATE TABLE photos(
        pho_id   Int  Auto_increment  NOT NULL ,
        pho_name Varchar (50) NOT NULL ,
        alb_id   Int NOT NULL
	,CONSTRAINT photos_PK PRIMARY KEY (pho_id)

	,CONSTRAINT photos_album_FK FOREIGN KEY (alb_id) REFERENCES album(alb_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: actualites
#------------------------------------------------------------

CREATE TABLE actualites(
        actu_id       Int  Auto_increment  NOT NULL ,
        actu_type     Varchar (50) NOT NULL ,
        actu_date     Varchar (50) NOT NULL ,
        actu_title    Varchar (50) NOT NULL ,
        actu_text     Varchar (50) NOT NULL ,
        actu_pictures Varchar (50) NOT NULL
	,CONSTRAINT actualites_PK PRIMARY KEY (actu_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: score
#------------------------------------------------------------

CREATE TABLE score(
        mat_id       Int NOT NULL ,
        equ_id       Int NOT NULL ,
        score_equipe Int NOT NULL
	,CONSTRAINT score_PK PRIMARY KEY (mat_id,equ_id)

	,CONSTRAINT score_matchs_FK FOREIGN KEY (mat_id) REFERENCES matchs(mat_id)
	,CONSTRAINT score_equipes0_FK FOREIGN KEY (equ_id) REFERENCES equipes(equ_id)
)ENGINE=InnoDB;

