CREATE DATABASE webprocesos
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'es_VE.UTF-8'
       LC_CTYPE = 'es_VE.UTF-8'
       CONNECTION LIMIT = -1;


-- Table: public.users

-- DROP TABLE public.users;

CREATE TABLE public.users
(
  iduser serial,
  name character(30) NOT NULL,
  lastname character(30) NOT NULL,
  usuario character(20) NOT NULL,
  email character(100) NOT NULL,
  password character(10) NOT NULL,
  estado boolean DEFAULT true,
  deleted timestamp without time zone,
  created_at timestamp without time zone DEFAULT now(),
  updated_at timestamp without time zone DEFAULT now(),
  CONSTRAINT userspk PRIMARY KEY (iduser),
  CONSTRAINT unq_users_email UNIQUE (email),
  CONSTRAINT unq_users_user UNIQUE (usuario)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.users
  OWNER TO postgres;


  -- Table: public.sede

-- DROP TABLE public.sede;

CREATE TABLE public.sede
(
  id_sede serial,
  nombre character(80) NOT NULL,
  created_at timestamp without time zone DEFAULT now(),
  updated_at timestamp without time zone DEFAULT now(),
  CONSTRAINT sede_pk PRIMARY KEY (id_sede),
  CONSTRAINT unq_sedes UNIQUE (nombre)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.sede
  OWNER TO postgres;

  CREATE TABLE public.procesos
(
  id_proceso serial,
  nombre character(80) NOT NULL,
  descripcion character varying(200) NOT NULL,
  id_sede integer NOT NULL,
  presupuesto numeric(19,2),
  created_at timestamp without time zone DEFAULT now(),
  updated_at timestamp without time zone DEFAULT now(),
  CONSTRAINT proceso_pk PRIMARY KEY (id_proceso),
  CONSTRAINT fk_procesos_sede FOREIGN KEY (id_sede)
      REFERENCES public.sede (id_sede) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE RESTRICT
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.procesos
  OWNER TO postgres;