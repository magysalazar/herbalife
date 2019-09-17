<?php

namespace Map;

use \CiUsuarios;
use \CiUsuariosQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'ci_usuarios' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CiUsuariosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CiUsuariosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ci_usuarios';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CiUsuarios';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CiUsuarios';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 30;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 30;

    /**
     * the column name for the id_usuario field
     */
    const COL_ID_USUARIO = 'ci_usuarios.id_usuario';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'ci_usuarios.nombre';

    /**
     * the column name for the apellido field
     */
    const COL_APELLIDO = 'ci_usuarios.apellido';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'ci_usuarios.username';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'ci_usuarios.email';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'ci_usuarios.password';

    /**
     * the column name for the fec_nacimiento field
     */
    const COL_FEC_NACIMIENTO = 'ci_usuarios.fec_nacimiento';

    /**
     * the column name for the sexo field
     */
    const COL_SEXO = 'ci_usuarios.sexo';

    /**
     * the column name for the invitado_por field
     */
    const COL_INVITADO_POR = 'ci_usuarios.invitado_por';

    /**
     * the column name for the phone_number_1 field
     */
    const COL_PHONE_NUMBER_1 = 'ci_usuarios.phone_number_1';

    /**
     * the column name for the phone_number_2 field
     */
    const COL_PHONE_NUMBER_2 = 'ci_usuarios.phone_number_2';

    /**
     * the column name for the cellphone_number_1 field
     */
    const COL_CELLPHONE_NUMBER_1 = 'ci_usuarios.cellphone_number_1';

    /**
     * the column name for the cellphone_number_2 field
     */
    const COL_CELLPHONE_NUMBER_2 = 'ci_usuarios.cellphone_number_2';

    /**
     * the column name for the cod_acceso field
     */
    const COL_COD_ACCESO = 'ci_usuarios.cod_acceso';

    /**
     * the column name for the id_option_tipo_asociado field
     */
    const COL_ID_OPTION_TIPO_ASOCIADO = 'ci_usuarios.id_option_tipo_asociado';

    /**
     * the column name for the id_option_nivel_asociado field
     */
    const COL_ID_OPTION_NIVEL_ASOCIADO = 'ci_usuarios.id_option_nivel_asociado';

    /**
     * the column name for the id_club field
     */
    const COL_ID_CLUB = 'ci_usuarios.id_club';

    /**
     * the column name for the id_turno field
     */
    const COL_ID_TURNO = 'ci_usuarios.id_turno';

    /**
     * the column name for the id_sesion field
     */
    const COL_ID_SESION = 'ci_usuarios.id_sesion';

    /**
     * the column name for the id_opcion_role field
     */
    const COL_ID_OPCION_ROLE = 'ci_usuarios.id_opcion_role';

    /**
     * the column name for the foto_perfil field
     */
    const COL_FOTO_PERFIL = 'ci_usuarios.foto_perfil';

    /**
     * the column name for the app_monitor field
     */
    const COL_APP_MONITOR = 'ci_usuarios.app_monitor';

    /**
     * the column name for the app_orders field
     */
    const COL_APP_ORDERS = 'ci_usuarios.app_orders';

    /**
     * the column name for the app_admin field
     */
    const COL_APP_ADMIN = 'ci_usuarios.app_admin';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'ci_usuarios.change_count';

    /**
     * the column name for the herbalife_key field
     */
    const COL_HERBALIFE_KEY = 'ci_usuarios.herbalife_key';

    /**
     * the column name for the id_tipo_usuario field
     */
    const COL_ID_TIPO_USUARIO = 'ci_usuarios.id_tipo_usuario';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'ci_usuarios.estado';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'ci_usuarios.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'ci_usuarios.date_created';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdUsuario', 'Nombre', 'Apellido', 'Username', 'Email', 'Password', 'FecNacimiento', 'Sexo', 'InvitadoPor', 'PhoneNumber1', 'PhoneNumber2', 'CellphoneNumber1', 'CellphoneNumber2', 'CodAcceso', 'IdOptionTipoAsociado', 'IdOptionNivelAsociado', 'IdClub', 'IdTurno', 'IdSesion', 'IdOpcionRole', 'FotoPerfil', 'AppMonitor', 'AppOrders', 'AppAdmin', 'ChangeCount', 'HerbalifeKey', 'IdTipoUsuario', 'Estado', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idUsuario', 'nombre', 'apellido', 'username', 'email', 'password', 'fecNacimiento', 'sexo', 'invitadoPor', 'phoneNumber1', 'phoneNumber2', 'cellphoneNumber1', 'cellphoneNumber2', 'codAcceso', 'idOptionTipoAsociado', 'idOptionNivelAsociado', 'idClub', 'idTurno', 'idSesion', 'idOpcionRole', 'fotoPerfil', 'appMonitor', 'appOrders', 'appAdmin', 'changeCount', 'herbalifeKey', 'idTipoUsuario', 'estado', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(CiUsuariosTableMap::COL_ID_USUARIO, CiUsuariosTableMap::COL_NOMBRE, CiUsuariosTableMap::COL_APELLIDO, CiUsuariosTableMap::COL_USERNAME, CiUsuariosTableMap::COL_EMAIL, CiUsuariosTableMap::COL_PASSWORD, CiUsuariosTableMap::COL_FEC_NACIMIENTO, CiUsuariosTableMap::COL_SEXO, CiUsuariosTableMap::COL_INVITADO_POR, CiUsuariosTableMap::COL_PHONE_NUMBER_1, CiUsuariosTableMap::COL_PHONE_NUMBER_2, CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1, CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2, CiUsuariosTableMap::COL_COD_ACCESO, CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO, CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO, CiUsuariosTableMap::COL_ID_CLUB, CiUsuariosTableMap::COL_ID_TURNO, CiUsuariosTableMap::COL_ID_SESION, CiUsuariosTableMap::COL_ID_OPCION_ROLE, CiUsuariosTableMap::COL_FOTO_PERFIL, CiUsuariosTableMap::COL_APP_MONITOR, CiUsuariosTableMap::COL_APP_ORDERS, CiUsuariosTableMap::COL_APP_ADMIN, CiUsuariosTableMap::COL_CHANGE_COUNT, CiUsuariosTableMap::COL_HERBALIFE_KEY, CiUsuariosTableMap::COL_ID_TIPO_USUARIO, CiUsuariosTableMap::COL_ESTADO, CiUsuariosTableMap::COL_DATE_MODIFIED, CiUsuariosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_usuario', 'nombre', 'apellido', 'username', 'email', 'password', 'fec_nacimiento', 'sexo', 'invitado_por', 'phone_number_1', 'phone_number_2', 'cellphone_number_1', 'cellphone_number_2', 'cod_acceso', 'id_option_tipo_asociado', 'id_option_nivel_asociado', 'id_club', 'id_turno', 'id_sesion', 'id_opcion_role', 'foto_perfil', 'app_monitor', 'app_orders', 'app_admin', 'change_count', 'herbalife_key', 'id_tipo_usuario', 'estado', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdUsuario' => 0, 'Nombre' => 1, 'Apellido' => 2, 'Username' => 3, 'Email' => 4, 'Password' => 5, 'FecNacimiento' => 6, 'Sexo' => 7, 'InvitadoPor' => 8, 'PhoneNumber1' => 9, 'PhoneNumber2' => 10, 'CellphoneNumber1' => 11, 'CellphoneNumber2' => 12, 'CodAcceso' => 13, 'IdOptionTipoAsociado' => 14, 'IdOptionNivelAsociado' => 15, 'IdClub' => 16, 'IdTurno' => 17, 'IdSesion' => 18, 'IdOpcionRole' => 19, 'FotoPerfil' => 20, 'AppMonitor' => 21, 'AppOrders' => 22, 'AppAdmin' => 23, 'ChangeCount' => 24, 'HerbalifeKey' => 25, 'IdTipoUsuario' => 26, 'Estado' => 27, 'DateModified' => 28, 'DateCreated' => 29, ),
        self::TYPE_CAMELNAME     => array('idUsuario' => 0, 'nombre' => 1, 'apellido' => 2, 'username' => 3, 'email' => 4, 'password' => 5, 'fecNacimiento' => 6, 'sexo' => 7, 'invitadoPor' => 8, 'phoneNumber1' => 9, 'phoneNumber2' => 10, 'cellphoneNumber1' => 11, 'cellphoneNumber2' => 12, 'codAcceso' => 13, 'idOptionTipoAsociado' => 14, 'idOptionNivelAsociado' => 15, 'idClub' => 16, 'idTurno' => 17, 'idSesion' => 18, 'idOpcionRole' => 19, 'fotoPerfil' => 20, 'appMonitor' => 21, 'appOrders' => 22, 'appAdmin' => 23, 'changeCount' => 24, 'herbalifeKey' => 25, 'idTipoUsuario' => 26, 'estado' => 27, 'dateModified' => 28, 'dateCreated' => 29, ),
        self::TYPE_COLNAME       => array(CiUsuariosTableMap::COL_ID_USUARIO => 0, CiUsuariosTableMap::COL_NOMBRE => 1, CiUsuariosTableMap::COL_APELLIDO => 2, CiUsuariosTableMap::COL_USERNAME => 3, CiUsuariosTableMap::COL_EMAIL => 4, CiUsuariosTableMap::COL_PASSWORD => 5, CiUsuariosTableMap::COL_FEC_NACIMIENTO => 6, CiUsuariosTableMap::COL_SEXO => 7, CiUsuariosTableMap::COL_INVITADO_POR => 8, CiUsuariosTableMap::COL_PHONE_NUMBER_1 => 9, CiUsuariosTableMap::COL_PHONE_NUMBER_2 => 10, CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1 => 11, CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2 => 12, CiUsuariosTableMap::COL_COD_ACCESO => 13, CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO => 14, CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO => 15, CiUsuariosTableMap::COL_ID_CLUB => 16, CiUsuariosTableMap::COL_ID_TURNO => 17, CiUsuariosTableMap::COL_ID_SESION => 18, CiUsuariosTableMap::COL_ID_OPCION_ROLE => 19, CiUsuariosTableMap::COL_FOTO_PERFIL => 20, CiUsuariosTableMap::COL_APP_MONITOR => 21, CiUsuariosTableMap::COL_APP_ORDERS => 22, CiUsuariosTableMap::COL_APP_ADMIN => 23, CiUsuariosTableMap::COL_CHANGE_COUNT => 24, CiUsuariosTableMap::COL_HERBALIFE_KEY => 25, CiUsuariosTableMap::COL_ID_TIPO_USUARIO => 26, CiUsuariosTableMap::COL_ESTADO => 27, CiUsuariosTableMap::COL_DATE_MODIFIED => 28, CiUsuariosTableMap::COL_DATE_CREATED => 29, ),
        self::TYPE_FIELDNAME     => array('id_usuario' => 0, 'nombre' => 1, 'apellido' => 2, 'username' => 3, 'email' => 4, 'password' => 5, 'fec_nacimiento' => 6, 'sexo' => 7, 'invitado_por' => 8, 'phone_number_1' => 9, 'phone_number_2' => 10, 'cellphone_number_1' => 11, 'cellphone_number_2' => 12, 'cod_acceso' => 13, 'id_option_tipo_asociado' => 14, 'id_option_nivel_asociado' => 15, 'id_club' => 16, 'id_turno' => 17, 'id_sesion' => 18, 'id_opcion_role' => 19, 'foto_perfil' => 20, 'app_monitor' => 21, 'app_orders' => 22, 'app_admin' => 23, 'change_count' => 24, 'herbalife_key' => 25, 'id_tipo_usuario' => 26, 'estado' => 27, 'date_modified' => 28, 'date_created' => 29, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('ci_usuarios');
        $this->setPhpName('CiUsuarios');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CiUsuarios');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_usuario', 'IdUsuario', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', false, 256, null);
        $this->addColumn('apellido', 'Apellido', 'VARCHAR', false, 256, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 250, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 100, '');
        $this->addColumn('password', 'Password', 'VARCHAR', true, 128, '');
        $this->addColumn('fec_nacimiento', 'FecNacimiento', 'DATE', false, null, null);
        $this->addColumn('sexo', 'Sexo', 'VARCHAR', false, 15, null);
        $this->addForeignKey('invitado_por', 'InvitadoPor', 'INTEGER', 'ci_usuarios', 'id_usuario', false, 10, null);
        $this->addColumn('phone_number_1', 'PhoneNumber1', 'VARCHAR', false, 20, null);
        $this->addColumn('phone_number_2', 'PhoneNumber2', 'VARCHAR', false, 20, null);
        $this->addColumn('cellphone_number_1', 'CellphoneNumber1', 'VARCHAR', false, 20, null);
        $this->addColumn('cellphone_number_2', 'CellphoneNumber2', 'VARCHAR', false, 20, null);
        $this->addColumn('cod_acceso', 'CodAcceso', 'VARCHAR', false, 50, null);
        $this->addForeignKey('id_option_tipo_asociado', 'IdOptionTipoAsociado', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addForeignKey('id_option_nivel_asociado', 'IdOptionNivelAsociado', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addForeignKey('id_club', 'IdClub', 'INTEGER', 'hbf_clubs', 'id_club', false, 10, null);
        $this->addForeignKey('id_turno', 'IdTurno', 'INTEGER', 'hbf_turnos', 'id_turno', false, 10, null);
        $this->addForeignKey('id_sesion', 'IdSesion', 'INTEGER', 'hbf_sesiones', 'id_sesion', false, 10, null);
        $this->addForeignKey('id_opcion_role', 'IdOpcionRole', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addColumn('foto_perfil', 'FotoPerfil', 'INTEGER', false, null, null);
        $this->addColumn('app_monitor', 'AppMonitor', 'VARCHAR', false, 50, null);
        $this->addColumn('app_orders', 'AppOrders', 'VARCHAR', false, 50, null);
        $this->addColumn('app_admin', 'AppAdmin', 'VARCHAR', false, 50, null);
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addColumn('herbalife_key', 'HerbalifeKey', 'VARCHAR', false, 256, null);
        $this->addForeignKey('id_tipo_usuario', 'IdTipoUsuario', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CiOptionsRelatedByIdOptionTipoAsociado', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_option_tipo_asociado',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('CiOptionsRelatedByIdOptionNivelAsociado', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_option_nivel_asociado',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('CiUsuariosRelatedByInvitadoPor', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':invitado_por',
    1 => ':id_usuario',
  ),
), null, null, null, false);
        $this->addRelation('CiOptionsRelatedByIdOpcionRole', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_opcion_role',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('HbfTurnosRelatedByIdTurno', '\\HbfTurnos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, null, false);
        $this->addRelation('HbfSesionesRelatedByIdSesion', '\\HbfSesiones', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
  ),
), null, null, null, false);
        $this->addRelation('CiOptionsRelatedByIdTipoUsuario', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_tipo_usuario',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('HbfClubsRelatedByIdClub', '\\HbfClubs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, null, false);
        $this->addRelation('CiModulosRelatedByIdUserCreated', '\\CiModulos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'CiModulossRelatedByIdUserCreated', false);
        $this->addRelation('CiModulosRelatedByIdUserModified', '\\CiModulos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'CiModulossRelatedByIdUserModified', false);
        $this->addRelation('CiOptionsRelatedByIdUserCreated', '\\CiOptions', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'CiOptionssRelatedByIdUserCreated', false);
        $this->addRelation('CiOptionsRelatedByIdUserModified', '\\CiOptions', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'CiOptionssRelatedByIdUserModified', false);
        $this->addRelation('CiSessions', '\\CiSessions', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_usuario',
    1 => ':id_usuario',
  ),
), null, null, 'CiSessionss', false);
        $this->addRelation('CiSettingsRelatedByIdUserCreated', '\\CiSettings', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'CiSettingssRelatedByIdUserCreated', false);
        $this->addRelation('CiSettingsRelatedByIdUserModified', '\\CiSettings', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'CiSettingssRelatedByIdUserModified', false);
        $this->addRelation('CiUsuariosRelatedByIdUsuario', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':invitado_por',
    1 => ':id_usuario',
  ),
), null, null, 'CiUsuariossRelatedByIdUsuario', false);
        $this->addRelation('HbfClubsRelatedByIdUserCreated', '\\HbfClubs', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfClubssRelatedByIdUserCreated', false);
        $this->addRelation('HbfClubsRelatedByIdUserModified', '\\HbfClubs', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfClubssRelatedByIdUserModified', false);
        $this->addRelation('HbfComandasRelatedByIdUserCreated', '\\HbfComandas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfComandassRelatedByIdUserCreated', false);
        $this->addRelation('HbfComandasRelatedByIdUserModified', '\\HbfComandas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfComandassRelatedByIdUserModified', false);
        $this->addRelation('HbfComandasRelatedByIdCliente', '\\HbfComandas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, 'HbfComandassRelatedByIdCliente', false);
        $this->addRelation('HbfDetallesPedidosRelatedByIdUserCreated', '\\HbfDetallesPedidos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfDetallesPedidossRelatedByIdUserCreated', false);
        $this->addRelation('HbfDetallesPedidosRelatedByIdUserModified', '\\HbfDetallesPedidos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfDetallesPedidossRelatedByIdUserModified', false);
        $this->addRelation('HbfEgresosRelatedByIdUserCreated', '\\HbfEgresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfEgresossRelatedByIdUserCreated', false);
        $this->addRelation('HbfEgresosRelatedByIdUserModified', '\\HbfEgresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfEgresossRelatedByIdUserModified', false);
        $this->addRelation('HbfEgresosRelatedByIdCliente', '\\HbfEgresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, 'HbfEgresossRelatedByIdCliente', false);
        $this->addRelation('HbfIngresosRelatedByIdUserCreated', '\\HbfIngresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfIngresossRelatedByIdUserCreated', false);
        $this->addRelation('HbfIngresosRelatedByIdUserModified', '\\HbfIngresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfIngresossRelatedByIdUserModified', false);
        $this->addRelation('HbfIngresosRelatedByIdCliente', '\\HbfIngresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, 'HbfIngresossRelatedByIdCliente', false);
        $this->addRelation('HbfPorcionesRelatedByIdUserCreated', '\\HbfPorciones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfPorcionessRelatedByIdUserCreated', false);
        $this->addRelation('HbfPorcionesRelatedByIdUserModified', '\\HbfPorciones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfPorcionessRelatedByIdUserModified', false);
        $this->addRelation('HbfPrepagosRelatedByIdCliente', '\\HbfPrepagos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, 'HbfPrepagossRelatedByIdCliente', false);
        $this->addRelation('HbfPrepagosRelatedByIdUserCreated', '\\HbfPrepagos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfPrepagossRelatedByIdUserCreated', false);
        $this->addRelation('HbfPrepagosRelatedByIdUserModified', '\\HbfPrepagos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfPrepagossRelatedByIdUserModified', false);
        $this->addRelation('HbfProductosRelatedByIdUserCreated', '\\HbfProductos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfProductossRelatedByIdUserCreated', false);
        $this->addRelation('HbfProductosRelatedByIdUserModified', '\\HbfProductos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfProductossRelatedByIdUserModified', false);
        $this->addRelation('HbfSesionesRelatedByIdUserCreated', '\\HbfSesiones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfSesionessRelatedByIdUserCreated', false);
        $this->addRelation('HbfSesionesRelatedByIdUserModified', '\\HbfSesiones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfSesionessRelatedByIdUserModified', false);
        $this->addRelation('HbfSesionesRelatedByIdAsociado', '\\HbfSesiones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_asociado',
    1 => ':id_usuario',
  ),
), null, null, 'HbfSesionessRelatedByIdAsociado', false);
        $this->addRelation('HbfTurnosRelatedByIdUserCreated', '\\HbfTurnos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfTurnossRelatedByIdUserCreated', false);
        $this->addRelation('HbfTurnosRelatedByIdUserModified', '\\HbfTurnos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfTurnossRelatedByIdUserModified', false);
        $this->addRelation('HbfTurnosRelatedByIdAsociado', '\\HbfTurnos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_asociado',
    1 => ':id_usuario',
  ),
), null, null, 'HbfTurnossRelatedByIdAsociado', false);
        $this->addRelation('HbfVasosRelatedByIdUserModified', '\\HbfVasos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), 'CASCADE', 'CASCADE', 'HbfVasossRelatedByIdUserModified', false);
        $this->addRelation('HbfVasosRelatedByIdUserCreated', '\\HbfVasos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), 'CASCADE', 'CASCADE', 'HbfVasossRelatedByIdUserCreated', false);
        $this->addRelation('HbfVentasRelatedByIdUserCreated', '\\HbfVentas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, 'HbfVentassRelatedByIdUserCreated', false);
        $this->addRelation('HbfVentasRelatedByIdUserModified', '\\HbfVentas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, 'HbfVentassRelatedByIdUserModified', false);
        $this->addRelation('HbfVentasRelatedByIdCliente', '\\HbfVentas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, 'HbfVentassRelatedByIdCliente', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to ci_usuarios     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        HbfVasosTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CiUsuariosTableMap::CLASS_DEFAULT : CiUsuariosTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (CiUsuarios object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CiUsuariosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CiUsuariosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CiUsuariosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CiUsuariosTableMap::OM_CLASS;
            /** @var CiUsuarios $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CiUsuariosTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CiUsuariosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CiUsuariosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CiUsuarios $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CiUsuariosTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_USUARIO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_APELLIDO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_USERNAME);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_EMAIL);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_FEC_NACIMIENTO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_SEXO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_INVITADO_POR);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_PHONE_NUMBER_1);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_PHONE_NUMBER_2);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_COD_ACCESO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_CLUB);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_TURNO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_SESION);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_OPCION_ROLE);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_FOTO_PERFIL);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_APP_MONITOR);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_APP_ORDERS);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_APP_ADMIN);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_HERBALIFE_KEY);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ID_TIPO_USUARIO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(CiUsuariosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_usuario');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.apellido');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.fec_nacimiento');
            $criteria->addSelectColumn($alias . '.sexo');
            $criteria->addSelectColumn($alias . '.invitado_por');
            $criteria->addSelectColumn($alias . '.phone_number_1');
            $criteria->addSelectColumn($alias . '.phone_number_2');
            $criteria->addSelectColumn($alias . '.cellphone_number_1');
            $criteria->addSelectColumn($alias . '.cellphone_number_2');
            $criteria->addSelectColumn($alias . '.cod_acceso');
            $criteria->addSelectColumn($alias . '.id_option_tipo_asociado');
            $criteria->addSelectColumn($alias . '.id_option_nivel_asociado');
            $criteria->addSelectColumn($alias . '.id_club');
            $criteria->addSelectColumn($alias . '.id_turno');
            $criteria->addSelectColumn($alias . '.id_sesion');
            $criteria->addSelectColumn($alias . '.id_opcion_role');
            $criteria->addSelectColumn($alias . '.foto_perfil');
            $criteria->addSelectColumn($alias . '.app_monitor');
            $criteria->addSelectColumn($alias . '.app_orders');
            $criteria->addSelectColumn($alias . '.app_admin');
            $criteria->addSelectColumn($alias . '.change_count');
            $criteria->addSelectColumn($alias . '.herbalife_key');
            $criteria->addSelectColumn($alias . '.id_tipo_usuario');
            $criteria->addSelectColumn($alias . '.estado');
            $criteria->addSelectColumn($alias . '.date_modified');
            $criteria->addSelectColumn($alias . '.date_created');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CiUsuariosTableMap::DATABASE_NAME)->getTable(CiUsuariosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CiUsuariosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CiUsuariosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CiUsuariosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CiUsuarios or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CiUsuarios object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CiUsuarios) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CiUsuariosTableMap::DATABASE_NAME);
            $criteria->add(CiUsuariosTableMap::COL_ID_USUARIO, (array) $values, Criteria::IN);
        }

        $query = CiUsuariosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CiUsuariosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CiUsuariosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ci_usuarios table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CiUsuariosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CiUsuarios or Criteria object.
     *
     * @param mixed               $criteria Criteria or CiUsuarios object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CiUsuarios object
        }

        if ($criteria->containsKey(CiUsuariosTableMap::COL_ID_USUARIO) && $criteria->keyContainsValue(CiUsuariosTableMap::COL_ID_USUARIO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CiUsuariosTableMap::COL_ID_USUARIO.')');
        }


        // Set the correct dbName
        $query = CiUsuariosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CiUsuariosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CiUsuariosTableMap::buildTableMap();
