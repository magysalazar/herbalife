<?php

namespace Base;

use \CiModulos as ChildCiModulos;
use \CiModulosQuery as ChildCiModulosQuery;
use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
use \CiSessions as ChildCiSessions;
use \CiSessionsQuery as ChildCiSessionsQuery;
use \CiSettings as ChildCiSettings;
use \CiSettingsQuery as ChildCiSettingsQuery;
use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \HbfClubs as ChildHbfClubs;
use \HbfClubsQuery as ChildHbfClubsQuery;
use \HbfComandas as ChildHbfComandas;
use \HbfComandasQuery as ChildHbfComandasQuery;
use \HbfDetallesPedidos as ChildHbfDetallesPedidos;
use \HbfDetallesPedidosQuery as ChildHbfDetallesPedidosQuery;
use \HbfEgresos as ChildHbfEgresos;
use \HbfEgresosQuery as ChildHbfEgresosQuery;
use \HbfIngresos as ChildHbfIngresos;
use \HbfIngresosQuery as ChildHbfIngresosQuery;
use \HbfPorciones as ChildHbfPorciones;
use \HbfPorcionesQuery as ChildHbfPorcionesQuery;
use \HbfPrepagos as ChildHbfPrepagos;
use \HbfPrepagosQuery as ChildHbfPrepagosQuery;
use \HbfProductos as ChildHbfProductos;
use \HbfProductosQuery as ChildHbfProductosQuery;
use \HbfSesiones as ChildHbfSesiones;
use \HbfSesionesQuery as ChildHbfSesionesQuery;
use \HbfTurnos as ChildHbfTurnos;
use \HbfTurnosQuery as ChildHbfTurnosQuery;
use \HbfVasos as ChildHbfVasos;
use \HbfVasosQuery as ChildHbfVasosQuery;
use \HbfVentas as ChildHbfVentas;
use \HbfVentasQuery as ChildHbfVentasQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CiModulosTableMap;
use Map\CiOptionsTableMap;
use Map\CiSessionsTableMap;
use Map\CiSettingsTableMap;
use Map\CiUsuariosTableMap;
use Map\HbfClubsTableMap;
use Map\HbfComandasTableMap;
use Map\HbfDetallesPedidosTableMap;
use Map\HbfEgresosTableMap;
use Map\HbfIngresosTableMap;
use Map\HbfPorcionesTableMap;
use Map\HbfPrepagosTableMap;
use Map\HbfProductosTableMap;
use Map\HbfSesionesTableMap;
use Map\HbfTurnosTableMap;
use Map\HbfVasosTableMap;
use Map\HbfVentasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'ci_usuarios' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class CiUsuarios implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CiUsuariosTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id_usuario field.
     *
     * @var        int
     */
    protected $id_usuario;

    /**
     * The value for the nombre field.
     *
     * @var        string
     */
    protected $nombre;

    /**
     * The value for the apellido field.
     *
     * @var        string
     */
    protected $apellido;

    /**
     * The value for the username field.
     *
     * @var        string
     */
    protected $username;

    /**
     * The value for the email field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $email;

    /**
     * The value for the password field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $password;

    /**
     * The value for the fec_nacimiento field.
     *
     * @var        DateTime
     */
    protected $fec_nacimiento;

    /**
     * The value for the sexo field.
     *
     * @var        string
     */
    protected $sexo;

    /**
     * The value for the invitado_por field.
     *
     * @var        int
     */
    protected $invitado_por;

    /**
     * The value for the phone_number_1 field.
     *
     * @var        string
     */
    protected $phone_number_1;

    /**
     * The value for the phone_number_2 field.
     *
     * @var        string
     */
    protected $phone_number_2;

    /**
     * The value for the cellphone_number_1 field.
     *
     * @var        string
     */
    protected $cellphone_number_1;

    /**
     * The value for the cellphone_number_2 field.
     *
     * @var        string
     */
    protected $cellphone_number_2;

    /**
     * The value for the cod_acceso field.
     *
     * @var        string
     */
    protected $cod_acceso;

    /**
     * The value for the id_option_tipo_asociado field.
     *
     * @var        int
     */
    protected $id_option_tipo_asociado;

    /**
     * The value for the id_option_nivel_asociado field.
     *
     * @var        int
     */
    protected $id_option_nivel_asociado;

    /**
     * The value for the id_club field.
     *
     * @var        int
     */
    protected $id_club;

    /**
     * The value for the id_turno field.
     *
     * @var        int
     */
    protected $id_turno;

    /**
     * The value for the id_sesion field.
     *
     * @var        int
     */
    protected $id_sesion;

    /**
     * The value for the id_opcion_role field.
     *
     * @var        int
     */
    protected $id_opcion_role;

    /**
     * The value for the foto_perfil field.
     *
     * @var        int
     */
    protected $foto_perfil;

    /**
     * The value for the app_monitor field.
     *
     * @var        string
     */
    protected $app_monitor;

    /**
     * The value for the app_orders field.
     *
     * @var        string
     */
    protected $app_orders;

    /**
     * The value for the app_admin field.
     *
     * @var        string
     */
    protected $app_admin;

    /**
     * The value for the change_count field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $change_count;

    /**
     * The value for the herbalife_key field.
     *
     * @var        string
     */
    protected $herbalife_key;

    /**
     * The value for the id_tipo_usuario field.
     *
     * @var        int
     */
    protected $id_tipo_usuario;

    /**
     * The value for the estado field.
     *
     * Note: this column has a database default value of: 'ENABLED'
     * @var        string
     */
    protected $estado;

    /**
     * The value for the date_modified field.
     *
     * @var        DateTime
     */
    protected $date_modified;

    /**
     * The value for the date_created field.
     *
     * @var        DateTime
     */
    protected $date_created;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptionsRelatedByIdOptionTipoAsociado;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptionsRelatedByIdOptionNivelAsociado;

    /**
     * @var        ChildCiUsuarios
     */
    protected $aCiUsuariosRelatedByInvitadoPor;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptionsRelatedByIdOpcionRole;

    /**
     * @var        ChildHbfTurnos
     */
    protected $aHbfTurnosRelatedByIdTurno;

    /**
     * @var        ChildHbfSesiones
     */
    protected $aHbfSesionesRelatedByIdSesion;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptionsRelatedByIdTipoUsuario;

    /**
     * @var        ChildHbfClubs
     */
    protected $aHbfClubsRelatedByIdClub;

    /**
     * @var        ObjectCollection|ChildCiModulos[] Collection to store aggregation of ChildCiModulos objects.
     */
    protected $collCiModulossRelatedByIdUserCreated;
    protected $collCiModulossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildCiModulos[] Collection to store aggregation of ChildCiModulos objects.
     */
    protected $collCiModulossRelatedByIdUserModified;
    protected $collCiModulossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildCiOptions[] Collection to store aggregation of ChildCiOptions objects.
     */
    protected $collCiOptionssRelatedByIdUserCreated;
    protected $collCiOptionssRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildCiOptions[] Collection to store aggregation of ChildCiOptions objects.
     */
    protected $collCiOptionssRelatedByIdUserModified;
    protected $collCiOptionssRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildCiSessions[] Collection to store aggregation of ChildCiSessions objects.
     */
    protected $collCiSessionss;
    protected $collCiSessionssPartial;

    /**
     * @var        ObjectCollection|ChildCiSettings[] Collection to store aggregation of ChildCiSettings objects.
     */
    protected $collCiSettingssRelatedByIdUserCreated;
    protected $collCiSettingssRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildCiSettings[] Collection to store aggregation of ChildCiSettings objects.
     */
    protected $collCiSettingssRelatedByIdUserModified;
    protected $collCiSettingssRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdUsuario;
    protected $collCiUsuariossRelatedByIdUsuarioPartial;

    /**
     * @var        ObjectCollection|ChildHbfClubs[] Collection to store aggregation of ChildHbfClubs objects.
     */
    protected $collHbfClubssRelatedByIdUserCreated;
    protected $collHbfClubssRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfClubs[] Collection to store aggregation of ChildHbfClubs objects.
     */
    protected $collHbfClubssRelatedByIdUserModified;
    protected $collHbfClubssRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfComandas[] Collection to store aggregation of ChildHbfComandas objects.
     */
    protected $collHbfComandassRelatedByIdUserCreated;
    protected $collHbfComandassRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfComandas[] Collection to store aggregation of ChildHbfComandas objects.
     */
    protected $collHbfComandassRelatedByIdUserModified;
    protected $collHbfComandassRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfComandas[] Collection to store aggregation of ChildHbfComandas objects.
     */
    protected $collHbfComandassRelatedByIdCliente;
    protected $collHbfComandassRelatedByIdClientePartial;

    /**
     * @var        ObjectCollection|ChildHbfDetallesPedidos[] Collection to store aggregation of ChildHbfDetallesPedidos objects.
     */
    protected $collHbfDetallesPedidossRelatedByIdUserCreated;
    protected $collHbfDetallesPedidossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfDetallesPedidos[] Collection to store aggregation of ChildHbfDetallesPedidos objects.
     */
    protected $collHbfDetallesPedidossRelatedByIdUserModified;
    protected $collHbfDetallesPedidossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfEgresos[] Collection to store aggregation of ChildHbfEgresos objects.
     */
    protected $collHbfEgresossRelatedByIdUserCreated;
    protected $collHbfEgresossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfEgresos[] Collection to store aggregation of ChildHbfEgresos objects.
     */
    protected $collHbfEgresossRelatedByIdUserModified;
    protected $collHbfEgresossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfEgresos[] Collection to store aggregation of ChildHbfEgresos objects.
     */
    protected $collHbfEgresossRelatedByIdCliente;
    protected $collHbfEgresossRelatedByIdClientePartial;

    /**
     * @var        ObjectCollection|ChildHbfIngresos[] Collection to store aggregation of ChildHbfIngresos objects.
     */
    protected $collHbfIngresossRelatedByIdUserCreated;
    protected $collHbfIngresossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfIngresos[] Collection to store aggregation of ChildHbfIngresos objects.
     */
    protected $collHbfIngresossRelatedByIdUserModified;
    protected $collHbfIngresossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfIngresos[] Collection to store aggregation of ChildHbfIngresos objects.
     */
    protected $collHbfIngresossRelatedByIdCliente;
    protected $collHbfIngresossRelatedByIdClientePartial;

    /**
     * @var        ObjectCollection|ChildHbfPorciones[] Collection to store aggregation of ChildHbfPorciones objects.
     */
    protected $collHbfPorcionessRelatedByIdUserCreated;
    protected $collHbfPorcionessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfPorciones[] Collection to store aggregation of ChildHbfPorciones objects.
     */
    protected $collHbfPorcionessRelatedByIdUserModified;
    protected $collHbfPorcionessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfPrepagos[] Collection to store aggregation of ChildHbfPrepagos objects.
     */
    protected $collHbfPrepagossRelatedByIdCliente;
    protected $collHbfPrepagossRelatedByIdClientePartial;

    /**
     * @var        ObjectCollection|ChildHbfPrepagos[] Collection to store aggregation of ChildHbfPrepagos objects.
     */
    protected $collHbfPrepagossRelatedByIdUserCreated;
    protected $collHbfPrepagossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfPrepagos[] Collection to store aggregation of ChildHbfPrepagos objects.
     */
    protected $collHbfPrepagossRelatedByIdUserModified;
    protected $collHbfPrepagossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfProductos[] Collection to store aggregation of ChildHbfProductos objects.
     */
    protected $collHbfProductossRelatedByIdUserCreated;
    protected $collHbfProductossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfProductos[] Collection to store aggregation of ChildHbfProductos objects.
     */
    protected $collHbfProductossRelatedByIdUserModified;
    protected $collHbfProductossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfSesiones[] Collection to store aggregation of ChildHbfSesiones objects.
     */
    protected $collHbfSesionessRelatedByIdUserCreated;
    protected $collHbfSesionessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfSesiones[] Collection to store aggregation of ChildHbfSesiones objects.
     */
    protected $collHbfSesionessRelatedByIdUserModified;
    protected $collHbfSesionessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfSesiones[] Collection to store aggregation of ChildHbfSesiones objects.
     */
    protected $collHbfSesionessRelatedByIdAsociado;
    protected $collHbfSesionessRelatedByIdAsociadoPartial;

    /**
     * @var        ObjectCollection|ChildHbfTurnos[] Collection to store aggregation of ChildHbfTurnos objects.
     */
    protected $collHbfTurnossRelatedByIdUserCreated;
    protected $collHbfTurnossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfTurnos[] Collection to store aggregation of ChildHbfTurnos objects.
     */
    protected $collHbfTurnossRelatedByIdUserModified;
    protected $collHbfTurnossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfTurnos[] Collection to store aggregation of ChildHbfTurnos objects.
     */
    protected $collHbfTurnossRelatedByIdAsociado;
    protected $collHbfTurnossRelatedByIdAsociadoPartial;

    /**
     * @var        ObjectCollection|ChildHbfVasos[] Collection to store aggregation of ChildHbfVasos objects.
     */
    protected $collHbfVasossRelatedByIdUserModified;
    protected $collHbfVasossRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfVasos[] Collection to store aggregation of ChildHbfVasos objects.
     */
    protected $collHbfVasossRelatedByIdUserCreated;
    protected $collHbfVasossRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfVentas[] Collection to store aggregation of ChildHbfVentas objects.
     */
    protected $collHbfVentassRelatedByIdUserCreated;
    protected $collHbfVentassRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildHbfVentas[] Collection to store aggregation of ChildHbfVentas objects.
     */
    protected $collHbfVentassRelatedByIdUserModified;
    protected $collHbfVentassRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildHbfVentas[] Collection to store aggregation of ChildHbfVentas objects.
     */
    protected $collHbfVentassRelatedByIdCliente;
    protected $collHbfVentassRelatedByIdClientePartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiModulos[]
     */
    protected $ciModulossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiModulos[]
     */
    protected $ciModulossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiOptions[]
     */
    protected $ciOptionssRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiOptions[]
     */
    protected $ciOptionssRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiSessions[]
     */
    protected $ciSessionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiSettings[]
     */
    protected $ciSettingssRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiSettings[]
     */
    protected $ciSettingssRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdUsuarioScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfClubs[]
     */
    protected $hbfClubssRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfClubs[]
     */
    protected $hbfClubssRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfComandas[]
     */
    protected $hbfComandassRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfComandas[]
     */
    protected $hbfComandassRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfComandas[]
     */
    protected $hbfComandassRelatedByIdClienteScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfDetallesPedidos[]
     */
    protected $hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfDetallesPedidos[]
     */
    protected $hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfEgresos[]
     */
    protected $hbfEgresossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfEgresos[]
     */
    protected $hbfEgresossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfEgresos[]
     */
    protected $hbfEgresossRelatedByIdClienteScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfIngresos[]
     */
    protected $hbfIngresossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfIngresos[]
     */
    protected $hbfIngresossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfIngresos[]
     */
    protected $hbfIngresossRelatedByIdClienteScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfPorciones[]
     */
    protected $hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfPorciones[]
     */
    protected $hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfPrepagos[]
     */
    protected $hbfPrepagossRelatedByIdClienteScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfPrepagos[]
     */
    protected $hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfPrepagos[]
     */
    protected $hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfProductos[]
     */
    protected $hbfProductossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfProductos[]
     */
    protected $hbfProductossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfSesiones[]
     */
    protected $hbfSesionessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfSesiones[]
     */
    protected $hbfSesionessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfSesiones[]
     */
    protected $hbfSesionessRelatedByIdAsociadoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfTurnos[]
     */
    protected $hbfTurnossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfTurnos[]
     */
    protected $hbfTurnossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfTurnos[]
     */
    protected $hbfTurnossRelatedByIdAsociadoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfVasos[]
     */
    protected $hbfVasossRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfVasos[]
     */
    protected $hbfVasossRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfVentas[]
     */
    protected $hbfVentassRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfVentas[]
     */
    protected $hbfVentassRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfVentas[]
     */
    protected $hbfVentassRelatedByIdClienteScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->email = '';
        $this->password = '';
        $this->change_count = 0;
        $this->estado = 'ENABLED';
    }

    /**
     * Initializes internal state of Base\CiUsuarios object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>CiUsuarios</code> instance.  If
     * <code>obj</code> is an instance of <code>CiUsuarios</code>, delegates to
     * <code>equals(CiUsuarios)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|CiUsuarios The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id_usuario] column value.
     *
     * @return int
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Get the [nombre] column value.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the [apellido] column value.
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [optionally formatted] temporal [fec_nacimiento] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFecNacimiento($format = NULL)
    {
        if ($format === null) {
            return $this->fec_nacimiento;
        } else {
            return $this->fec_nacimiento instanceof \DateTimeInterface ? $this->fec_nacimiento->format($format) : null;
        }
    }

    /**
     * Get the [sexo] column value.
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Get the [invitado_por] column value.
     *
     * @return int
     */
    public function getInvitadoPor()
    {
        return $this->invitado_por;
    }

    /**
     * Get the [phone_number_1] column value.
     *
     * @return string
     */
    public function getPhoneNumber1()
    {
        return $this->phone_number_1;
    }

    /**
     * Get the [phone_number_2] column value.
     *
     * @return string
     */
    public function getPhoneNumber2()
    {
        return $this->phone_number_2;
    }

    /**
     * Get the [cellphone_number_1] column value.
     *
     * @return string
     */
    public function getCellphoneNumber1()
    {
        return $this->cellphone_number_1;
    }

    /**
     * Get the [cellphone_number_2] column value.
     *
     * @return string
     */
    public function getCellphoneNumber2()
    {
        return $this->cellphone_number_2;
    }

    /**
     * Get the [cod_acceso] column value.
     *
     * @return string
     */
    public function getCodAcceso()
    {
        return $this->cod_acceso;
    }

    /**
     * Get the [id_option_tipo_asociado] column value.
     *
     * @return int
     */
    public function getIdOptionTipoAsociado()
    {
        return $this->id_option_tipo_asociado;
    }

    /**
     * Get the [id_option_nivel_asociado] column value.
     *
     * @return int
     */
    public function getIdOptionNivelAsociado()
    {
        return $this->id_option_nivel_asociado;
    }

    /**
     * Get the [id_club] column value.
     *
     * @return int
     */
    public function getIdClub()
    {
        return $this->id_club;
    }

    /**
     * Get the [id_turno] column value.
     *
     * @return int
     */
    public function getIdTurno()
    {
        return $this->id_turno;
    }

    /**
     * Get the [id_sesion] column value.
     *
     * @return int
     */
    public function getIdSesion()
    {
        return $this->id_sesion;
    }

    /**
     * Get the [id_opcion_role] column value.
     *
     * @return int
     */
    public function getIdOpcionRole()
    {
        return $this->id_opcion_role;
    }

    /**
     * Get the [foto_perfil] column value.
     *
     * @return int
     */
    public function getFotoPerfil()
    {
        return $this->foto_perfil;
    }

    /**
     * Get the [app_monitor] column value.
     *
     * @return string
     */
    public function getAppMonitor()
    {
        return $this->app_monitor;
    }

    /**
     * Get the [app_orders] column value.
     *
     * @return string
     */
    public function getAppOrders()
    {
        return $this->app_orders;
    }

    /**
     * Get the [app_admin] column value.
     *
     * @return string
     */
    public function getAppAdmin()
    {
        return $this->app_admin;
    }

    /**
     * Get the [change_count] column value.
     *
     * @return int
     */
    public function getChangeCount()
    {
        return $this->change_count;
    }

    /**
     * Get the [herbalife_key] column value.
     *
     * @return string
     */
    public function getHerbalifeKey()
    {
        return $this->herbalife_key;
    }

    /**
     * Get the [id_tipo_usuario] column value.
     *
     * @return int
     */
    public function getIdTipoUsuario()
    {
        return $this->id_tipo_usuario;
    }

    /**
     * Get the [estado] column value.
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Get the [optionally formatted] temporal [date_modified] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateModified($format = NULL)
    {
        if ($format === null) {
            return $this->date_modified;
        } else {
            return $this->date_modified instanceof \DateTimeInterface ? $this->date_modified->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [date_created] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateCreated($format = NULL)
    {
        if ($format === null) {
            return $this->date_created;
        } else {
            return $this->date_created instanceof \DateTimeInterface ? $this->date_created->format($format) : null;
        }
    }

    /**
     * Set the value of [id_usuario] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_usuario !== $v) {
            $this->id_usuario = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_USUARIO] = true;
        }

        return $this;
    } // setIdUsuario()

    /**
     * Set the value of [nombre] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_NOMBRE] = true;
        }

        return $this;
    } // setNombre()

    /**
     * Set the value of [apellido] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setApellido($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->apellido !== $v) {
            $this->apellido = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_APELLIDO] = true;
        }

        return $this;
    } // setApellido()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_USERNAME] = true;
        }

        return $this;
    } // setUsername()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Sets the value of [fec_nacimiento] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setFecNacimiento($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fec_nacimiento !== null || $dt !== null) {
            if ($this->fec_nacimiento === null || $dt === null || $dt->format("Y-m-d") !== $this->fec_nacimiento->format("Y-m-d")) {
                $this->fec_nacimiento = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CiUsuariosTableMap::COL_FEC_NACIMIENTO] = true;
            }
        } // if either are not null

        return $this;
    } // setFecNacimiento()

    /**
     * Set the value of [sexo] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setSexo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sexo !== $v) {
            $this->sexo = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_SEXO] = true;
        }

        return $this;
    } // setSexo()

    /**
     * Set the value of [invitado_por] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setInvitadoPor($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->invitado_por !== $v) {
            $this->invitado_por = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_INVITADO_POR] = true;
        }

        if ($this->aCiUsuariosRelatedByInvitadoPor !== null && $this->aCiUsuariosRelatedByInvitadoPor->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByInvitadoPor = null;
        }

        return $this;
    } // setInvitadoPor()

    /**
     * Set the value of [phone_number_1] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setPhoneNumber1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_number_1 !== $v) {
            $this->phone_number_1 = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_PHONE_NUMBER_1] = true;
        }

        return $this;
    } // setPhoneNumber1()

    /**
     * Set the value of [phone_number_2] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setPhoneNumber2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_number_2 !== $v) {
            $this->phone_number_2 = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_PHONE_NUMBER_2] = true;
        }

        return $this;
    } // setPhoneNumber2()

    /**
     * Set the value of [cellphone_number_1] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setCellphoneNumber1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cellphone_number_1 !== $v) {
            $this->cellphone_number_1 = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1] = true;
        }

        return $this;
    } // setCellphoneNumber1()

    /**
     * Set the value of [cellphone_number_2] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setCellphoneNumber2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cellphone_number_2 !== $v) {
            $this->cellphone_number_2 = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2] = true;
        }

        return $this;
    } // setCellphoneNumber2()

    /**
     * Set the value of [cod_acceso] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setCodAcceso($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cod_acceso !== $v) {
            $this->cod_acceso = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_COD_ACCESO] = true;
        }

        return $this;
    } // setCodAcceso()

    /**
     * Set the value of [id_option_tipo_asociado] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdOptionTipoAsociado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_option_tipo_asociado !== $v) {
            $this->id_option_tipo_asociado = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO] = true;
        }

        if ($this->aCiOptionsRelatedByIdOptionTipoAsociado !== null && $this->aCiOptionsRelatedByIdOptionTipoAsociado->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdOptionTipoAsociado = null;
        }

        return $this;
    } // setIdOptionTipoAsociado()

    /**
     * Set the value of [id_option_nivel_asociado] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdOptionNivelAsociado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_option_nivel_asociado !== $v) {
            $this->id_option_nivel_asociado = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO] = true;
        }

        if ($this->aCiOptionsRelatedByIdOptionNivelAsociado !== null && $this->aCiOptionsRelatedByIdOptionNivelAsociado->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdOptionNivelAsociado = null;
        }

        return $this;
    } // setIdOptionNivelAsociado()

    /**
     * Set the value of [id_club] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdClub($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_club !== $v) {
            $this->id_club = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_CLUB] = true;
        }

        if ($this->aHbfClubsRelatedByIdClub !== null && $this->aHbfClubsRelatedByIdClub->getIdClub() !== $v) {
            $this->aHbfClubsRelatedByIdClub = null;
        }

        return $this;
    } // setIdClub()

    /**
     * Set the value of [id_turno] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdTurno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_turno !== $v) {
            $this->id_turno = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_TURNO] = true;
        }

        if ($this->aHbfTurnosRelatedByIdTurno !== null && $this->aHbfTurnosRelatedByIdTurno->getIdTurno() !== $v) {
            $this->aHbfTurnosRelatedByIdTurno = null;
        }

        return $this;
    } // setIdTurno()

    /**
     * Set the value of [id_sesion] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdSesion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sesion !== $v) {
            $this->id_sesion = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_SESION] = true;
        }

        if ($this->aHbfSesionesRelatedByIdSesion !== null && $this->aHbfSesionesRelatedByIdSesion->getIdSesion() !== $v) {
            $this->aHbfSesionesRelatedByIdSesion = null;
        }

        return $this;
    } // setIdSesion()

    /**
     * Set the value of [id_opcion_role] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdOpcionRole($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_opcion_role !== $v) {
            $this->id_opcion_role = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_OPCION_ROLE] = true;
        }

        if ($this->aCiOptionsRelatedByIdOpcionRole !== null && $this->aCiOptionsRelatedByIdOpcionRole->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdOpcionRole = null;
        }

        return $this;
    } // setIdOpcionRole()

    /**
     * Set the value of [foto_perfil] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setFotoPerfil($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->foto_perfil !== $v) {
            $this->foto_perfil = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_FOTO_PERFIL] = true;
        }

        return $this;
    } // setFotoPerfil()

    /**
     * Set the value of [app_monitor] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setAppMonitor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->app_monitor !== $v) {
            $this->app_monitor = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_APP_MONITOR] = true;
        }

        return $this;
    } // setAppMonitor()

    /**
     * Set the value of [app_orders] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setAppOrders($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->app_orders !== $v) {
            $this->app_orders = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_APP_ORDERS] = true;
        }

        return $this;
    } // setAppOrders()

    /**
     * Set the value of [app_admin] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setAppAdmin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->app_admin !== $v) {
            $this->app_admin = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_APP_ADMIN] = true;
        }

        return $this;
    } // setAppAdmin()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [herbalife_key] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setHerbalifeKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->herbalife_key !== $v) {
            $this->herbalife_key = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_HERBALIFE_KEY] = true;
        }

        return $this;
    } // setHerbalifeKey()

    /**
     * Set the value of [id_tipo_usuario] column.
     *
     * @param int $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setIdTipoUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_tipo_usuario !== $v) {
            $this->id_tipo_usuario = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ID_TIPO_USUARIO] = true;
        }

        if ($this->aCiOptionsRelatedByIdTipoUsuario !== null && $this->aCiOptionsRelatedByIdTipoUsuario->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdTipoUsuario = null;
        }

        return $this;
    } // setIdTipoUsuario()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[CiUsuariosTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CiUsuariosTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CiUsuariosTableMap::COL_DATE_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateCreated()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->email !== '') {
                return false;
            }

            if ($this->password !== '') {
                return false;
            }

            if ($this->change_count !== 0) {
                return false;
            }

            if ($this->estado !== 'ENABLED') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CiUsuariosTableMap::translateFieldName('IdUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_usuario = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CiUsuariosTableMap::translateFieldName('Nombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CiUsuariosTableMap::translateFieldName('Apellido', TableMap::TYPE_PHPNAME, $indexType)];
            $this->apellido = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CiUsuariosTableMap::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)];
            $this->username = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CiUsuariosTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CiUsuariosTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CiUsuariosTableMap::translateFieldName('FecNacimiento', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fec_nacimiento = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CiUsuariosTableMap::translateFieldName('Sexo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sexo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CiUsuariosTableMap::translateFieldName('InvitadoPor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invitado_por = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CiUsuariosTableMap::translateFieldName('PhoneNumber1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_number_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CiUsuariosTableMap::translateFieldName('PhoneNumber2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_number_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CiUsuariosTableMap::translateFieldName('CellphoneNumber1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cellphone_number_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CiUsuariosTableMap::translateFieldName('CellphoneNumber2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cellphone_number_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CiUsuariosTableMap::translateFieldName('CodAcceso', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cod_acceso = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CiUsuariosTableMap::translateFieldName('IdOptionTipoAsociado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_option_tipo_asociado = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CiUsuariosTableMap::translateFieldName('IdOptionNivelAsociado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_option_nivel_asociado = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CiUsuariosTableMap::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_club = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CiUsuariosTableMap::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_turno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : CiUsuariosTableMap::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sesion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : CiUsuariosTableMap::translateFieldName('IdOpcionRole', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_opcion_role = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : CiUsuariosTableMap::translateFieldName('FotoPerfil', TableMap::TYPE_PHPNAME, $indexType)];
            $this->foto_perfil = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : CiUsuariosTableMap::translateFieldName('AppMonitor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->app_monitor = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : CiUsuariosTableMap::translateFieldName('AppOrders', TableMap::TYPE_PHPNAME, $indexType)];
            $this->app_orders = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : CiUsuariosTableMap::translateFieldName('AppAdmin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->app_admin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : CiUsuariosTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : CiUsuariosTableMap::translateFieldName('HerbalifeKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->herbalife_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : CiUsuariosTableMap::translateFieldName('IdTipoUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_tipo_usuario = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : CiUsuariosTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : CiUsuariosTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : CiUsuariosTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 30; // 30 = CiUsuariosTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CiUsuarios'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aCiUsuariosRelatedByInvitadoPor !== null && $this->invitado_por !== $this->aCiUsuariosRelatedByInvitadoPor->getIdUsuario()) {
            $this->aCiUsuariosRelatedByInvitadoPor = null;
        }
        if ($this->aCiOptionsRelatedByIdOptionTipoAsociado !== null && $this->id_option_tipo_asociado !== $this->aCiOptionsRelatedByIdOptionTipoAsociado->getIdOption()) {
            $this->aCiOptionsRelatedByIdOptionTipoAsociado = null;
        }
        if ($this->aCiOptionsRelatedByIdOptionNivelAsociado !== null && $this->id_option_nivel_asociado !== $this->aCiOptionsRelatedByIdOptionNivelAsociado->getIdOption()) {
            $this->aCiOptionsRelatedByIdOptionNivelAsociado = null;
        }
        if ($this->aHbfClubsRelatedByIdClub !== null && $this->id_club !== $this->aHbfClubsRelatedByIdClub->getIdClub()) {
            $this->aHbfClubsRelatedByIdClub = null;
        }
        if ($this->aHbfTurnosRelatedByIdTurno !== null && $this->id_turno !== $this->aHbfTurnosRelatedByIdTurno->getIdTurno()) {
            $this->aHbfTurnosRelatedByIdTurno = null;
        }
        if ($this->aHbfSesionesRelatedByIdSesion !== null && $this->id_sesion !== $this->aHbfSesionesRelatedByIdSesion->getIdSesion()) {
            $this->aHbfSesionesRelatedByIdSesion = null;
        }
        if ($this->aCiOptionsRelatedByIdOpcionRole !== null && $this->id_opcion_role !== $this->aCiOptionsRelatedByIdOpcionRole->getIdOption()) {
            $this->aCiOptionsRelatedByIdOpcionRole = null;
        }
        if ($this->aCiOptionsRelatedByIdTipoUsuario !== null && $this->id_tipo_usuario !== $this->aCiOptionsRelatedByIdTipoUsuario->getIdOption()) {
            $this->aCiOptionsRelatedByIdTipoUsuario = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCiUsuariosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiOptionsRelatedByIdOptionTipoAsociado = null;
            $this->aCiOptionsRelatedByIdOptionNivelAsociado = null;
            $this->aCiUsuariosRelatedByInvitadoPor = null;
            $this->aCiOptionsRelatedByIdOpcionRole = null;
            $this->aHbfTurnosRelatedByIdTurno = null;
            $this->aHbfSesionesRelatedByIdSesion = null;
            $this->aCiOptionsRelatedByIdTipoUsuario = null;
            $this->aHbfClubsRelatedByIdClub = null;
            $this->collCiModulossRelatedByIdUserCreated = null;

            $this->collCiModulossRelatedByIdUserModified = null;

            $this->collCiOptionssRelatedByIdUserCreated = null;

            $this->collCiOptionssRelatedByIdUserModified = null;

            $this->collCiSessionss = null;

            $this->collCiSettingssRelatedByIdUserCreated = null;

            $this->collCiSettingssRelatedByIdUserModified = null;

            $this->collCiUsuariossRelatedByIdUsuario = null;

            $this->collHbfClubssRelatedByIdUserCreated = null;

            $this->collHbfClubssRelatedByIdUserModified = null;

            $this->collHbfComandassRelatedByIdUserCreated = null;

            $this->collHbfComandassRelatedByIdUserModified = null;

            $this->collHbfComandassRelatedByIdCliente = null;

            $this->collHbfDetallesPedidossRelatedByIdUserCreated = null;

            $this->collHbfDetallesPedidossRelatedByIdUserModified = null;

            $this->collHbfEgresossRelatedByIdUserCreated = null;

            $this->collHbfEgresossRelatedByIdUserModified = null;

            $this->collHbfEgresossRelatedByIdCliente = null;

            $this->collHbfIngresossRelatedByIdUserCreated = null;

            $this->collHbfIngresossRelatedByIdUserModified = null;

            $this->collHbfIngresossRelatedByIdCliente = null;

            $this->collHbfPorcionessRelatedByIdUserCreated = null;

            $this->collHbfPorcionessRelatedByIdUserModified = null;

            $this->collHbfPrepagossRelatedByIdCliente = null;

            $this->collHbfPrepagossRelatedByIdUserCreated = null;

            $this->collHbfPrepagossRelatedByIdUserModified = null;

            $this->collHbfProductossRelatedByIdUserCreated = null;

            $this->collHbfProductossRelatedByIdUserModified = null;

            $this->collHbfSesionessRelatedByIdUserCreated = null;

            $this->collHbfSesionessRelatedByIdUserModified = null;

            $this->collHbfSesionessRelatedByIdAsociado = null;

            $this->collHbfTurnossRelatedByIdUserCreated = null;

            $this->collHbfTurnossRelatedByIdUserModified = null;

            $this->collHbfTurnossRelatedByIdAsociado = null;

            $this->collHbfVasossRelatedByIdUserModified = null;

            $this->collHbfVasossRelatedByIdUserCreated = null;

            $this->collHbfVentassRelatedByIdUserCreated = null;

            $this->collHbfVentassRelatedByIdUserModified = null;

            $this->collHbfVentassRelatedByIdCliente = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CiUsuarios::setDeleted()
     * @see CiUsuarios::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCiUsuariosQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CiUsuariosTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCiOptionsRelatedByIdOptionTipoAsociado !== null) {
                if ($this->aCiOptionsRelatedByIdOptionTipoAsociado->isModified() || $this->aCiOptionsRelatedByIdOptionTipoAsociado->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdOptionTipoAsociado->save($con);
                }
                $this->setCiOptionsRelatedByIdOptionTipoAsociado($this->aCiOptionsRelatedByIdOptionTipoAsociado);
            }

            if ($this->aCiOptionsRelatedByIdOptionNivelAsociado !== null) {
                if ($this->aCiOptionsRelatedByIdOptionNivelAsociado->isModified() || $this->aCiOptionsRelatedByIdOptionNivelAsociado->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdOptionNivelAsociado->save($con);
                }
                $this->setCiOptionsRelatedByIdOptionNivelAsociado($this->aCiOptionsRelatedByIdOptionNivelAsociado);
            }

            if ($this->aCiUsuariosRelatedByInvitadoPor !== null) {
                if ($this->aCiUsuariosRelatedByInvitadoPor->isModified() || $this->aCiUsuariosRelatedByInvitadoPor->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByInvitadoPor->save($con);
                }
                $this->setCiUsuariosRelatedByInvitadoPor($this->aCiUsuariosRelatedByInvitadoPor);
            }

            if ($this->aCiOptionsRelatedByIdOpcionRole !== null) {
                if ($this->aCiOptionsRelatedByIdOpcionRole->isModified() || $this->aCiOptionsRelatedByIdOpcionRole->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdOpcionRole->save($con);
                }
                $this->setCiOptionsRelatedByIdOpcionRole($this->aCiOptionsRelatedByIdOpcionRole);
            }

            if ($this->aHbfTurnosRelatedByIdTurno !== null) {
                if ($this->aHbfTurnosRelatedByIdTurno->isModified() || $this->aHbfTurnosRelatedByIdTurno->isNew()) {
                    $affectedRows += $this->aHbfTurnosRelatedByIdTurno->save($con);
                }
                $this->setHbfTurnosRelatedByIdTurno($this->aHbfTurnosRelatedByIdTurno);
            }

            if ($this->aHbfSesionesRelatedByIdSesion !== null) {
                if ($this->aHbfSesionesRelatedByIdSesion->isModified() || $this->aHbfSesionesRelatedByIdSesion->isNew()) {
                    $affectedRows += $this->aHbfSesionesRelatedByIdSesion->save($con);
                }
                $this->setHbfSesionesRelatedByIdSesion($this->aHbfSesionesRelatedByIdSesion);
            }

            if ($this->aCiOptionsRelatedByIdTipoUsuario !== null) {
                if ($this->aCiOptionsRelatedByIdTipoUsuario->isModified() || $this->aCiOptionsRelatedByIdTipoUsuario->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdTipoUsuario->save($con);
                }
                $this->setCiOptionsRelatedByIdTipoUsuario($this->aCiOptionsRelatedByIdTipoUsuario);
            }

            if ($this->aHbfClubsRelatedByIdClub !== null) {
                if ($this->aHbfClubsRelatedByIdClub->isModified() || $this->aHbfClubsRelatedByIdClub->isNew()) {
                    $affectedRows += $this->aHbfClubsRelatedByIdClub->save($con);
                }
                $this->setHbfClubsRelatedByIdClub($this->aHbfClubsRelatedByIdClub);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->ciModulossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->ciModulossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \CiModulosQuery::create()
                        ->filterByPrimaryKeys($this->ciModulossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collCiModulossRelatedByIdUserCreated !== null) {
                foreach ($this->collCiModulossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciModulossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->ciModulossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \CiModulosQuery::create()
                        ->filterByPrimaryKeys($this->ciModulossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collCiModulossRelatedByIdUserModified !== null) {
                foreach ($this->collCiModulossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \CiOptionsQuery::create()
                        ->filterByPrimaryKeys($this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collCiOptionssRelatedByIdUserCreated !== null) {
                foreach ($this->collCiOptionssRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \CiOptionsQuery::create()
                        ->filterByPrimaryKeys($this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collCiOptionssRelatedByIdUserModified !== null) {
                foreach ($this->collCiOptionssRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciSessionssScheduledForDeletion !== null) {
                if (!$this->ciSessionssScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciSessionssScheduledForDeletion as $ciSessions) {
                        // need to save related object because we set the relation to null
                        $ciSessions->save($con);
                    }
                    $this->ciSessionssScheduledForDeletion = null;
                }
            }

            if ($this->collCiSessionss !== null) {
                foreach ($this->collCiSessionss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \CiSettingsQuery::create()
                        ->filterByPrimaryKeys($this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collCiSettingssRelatedByIdUserCreated !== null) {
                foreach ($this->collCiSettingssRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \CiSettingsQuery::create()
                        ->filterByPrimaryKeys($this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collCiSettingssRelatedByIdUserModified !== null) {
                foreach ($this->collCiSettingssRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion as $ciUsuariosRelatedByIdUsuario) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdUsuario->save($con);
                    }
                    $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdUsuario !== null) {
                foreach ($this->collCiUsuariossRelatedByIdUsuario as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfClubsQuery::create()
                        ->filterByPrimaryKeys($this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfClubssRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfClubssRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfClubsQuery::create()
                        ->filterByPrimaryKeys($this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfClubssRelatedByIdUserModified !== null) {
                foreach ($this->collHbfClubssRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfComandasQuery::create()
                        ->filterByPrimaryKeys($this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfComandassRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfComandassRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfComandasQuery::create()
                        ->filterByPrimaryKeys($this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfComandassRelatedByIdUserModified !== null) {
                foreach ($this->collHbfComandassRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfComandassRelatedByIdClienteScheduledForDeletion !== null) {
                if (!$this->hbfComandassRelatedByIdClienteScheduledForDeletion->isEmpty()) {
                    \HbfComandasQuery::create()
                        ->filterByPrimaryKeys($this->hbfComandassRelatedByIdClienteScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfComandassRelatedByIdClienteScheduledForDeletion = null;
                }
            }

            if ($this->collHbfComandassRelatedByIdCliente !== null) {
                foreach ($this->collHbfComandassRelatedByIdCliente as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfDetallesPedidosQuery::create()
                        ->filterByPrimaryKeys($this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfDetallesPedidossRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfDetallesPedidossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfDetallesPedidosQuery::create()
                        ->filterByPrimaryKeys($this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfDetallesPedidossRelatedByIdUserModified !== null) {
                foreach ($this->collHbfDetallesPedidossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfEgresosQuery::create()
                        ->filterByPrimaryKeys($this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfEgresossRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfEgresossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfEgresosQuery::create()
                        ->filterByPrimaryKeys($this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfEgresossRelatedByIdUserModified !== null) {
                foreach ($this->collHbfEgresossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfEgresossRelatedByIdClienteScheduledForDeletion !== null) {
                if (!$this->hbfEgresossRelatedByIdClienteScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfEgresossRelatedByIdClienteScheduledForDeletion as $hbfEgresosRelatedByIdCliente) {
                        // need to save related object because we set the relation to null
                        $hbfEgresosRelatedByIdCliente->save($con);
                    }
                    $this->hbfEgresossRelatedByIdClienteScheduledForDeletion = null;
                }
            }

            if ($this->collHbfEgresossRelatedByIdCliente !== null) {
                foreach ($this->collHbfEgresossRelatedByIdCliente as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfIngresosQuery::create()
                        ->filterByPrimaryKeys($this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfIngresossRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfIngresossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfIngresosQuery::create()
                        ->filterByPrimaryKeys($this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfIngresossRelatedByIdUserModified !== null) {
                foreach ($this->collHbfIngresossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfIngresossRelatedByIdClienteScheduledForDeletion !== null) {
                if (!$this->hbfIngresossRelatedByIdClienteScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfIngresossRelatedByIdClienteScheduledForDeletion as $hbfIngresosRelatedByIdCliente) {
                        // need to save related object because we set the relation to null
                        $hbfIngresosRelatedByIdCliente->save($con);
                    }
                    $this->hbfIngresossRelatedByIdClienteScheduledForDeletion = null;
                }
            }

            if ($this->collHbfIngresossRelatedByIdCliente !== null) {
                foreach ($this->collHbfIngresossRelatedByIdCliente as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfPorcionesQuery::create()
                        ->filterByPrimaryKeys($this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfPorcionessRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfPorcionessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfPorcionesQuery::create()
                        ->filterByPrimaryKeys($this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfPorcionessRelatedByIdUserModified !== null) {
                foreach ($this->collHbfPorcionessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfPrepagossRelatedByIdClienteScheduledForDeletion !== null) {
                if (!$this->hbfPrepagossRelatedByIdClienteScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfPrepagossRelatedByIdClienteScheduledForDeletion as $hbfPrepagosRelatedByIdCliente) {
                        // need to save related object because we set the relation to null
                        $hbfPrepagosRelatedByIdCliente->save($con);
                    }
                    $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion = null;
                }
            }

            if ($this->collHbfPrepagossRelatedByIdCliente !== null) {
                foreach ($this->collHbfPrepagossRelatedByIdCliente as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfPrepagosQuery::create()
                        ->filterByPrimaryKeys($this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfPrepagossRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfPrepagossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfPrepagosQuery::create()
                        ->filterByPrimaryKeys($this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfPrepagossRelatedByIdUserModified !== null) {
                foreach ($this->collHbfPrepagossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfProductosQuery::create()
                        ->filterByPrimaryKeys($this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfProductossRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfProductossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfProductosQuery::create()
                        ->filterByPrimaryKeys($this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfProductossRelatedByIdUserModified !== null) {
                foreach ($this->collHbfProductossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfSesionesQuery::create()
                        ->filterByPrimaryKeys($this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfSesionessRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfSesionessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfSesionesQuery::create()
                        ->filterByPrimaryKeys($this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfSesionessRelatedByIdUserModified !== null) {
                foreach ($this->collHbfSesionessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion !== null) {
                if (!$this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion->isEmpty()) {
                    \HbfSesionesQuery::create()
                        ->filterByPrimaryKeys($this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion = null;
                }
            }

            if ($this->collHbfSesionessRelatedByIdAsociado !== null) {
                foreach ($this->collHbfSesionessRelatedByIdAsociado as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfTurnosQuery::create()
                        ->filterByPrimaryKeys($this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfTurnossRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfTurnossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfTurnosQuery::create()
                        ->filterByPrimaryKeys($this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfTurnossRelatedByIdUserModified !== null) {
                foreach ($this->collHbfTurnossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion !== null) {
                if (!$this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion->isEmpty()) {
                    \HbfTurnosQuery::create()
                        ->filterByPrimaryKeys($this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion = null;
                }
            }

            if ($this->collHbfTurnossRelatedByIdAsociado !== null) {
                foreach ($this->collHbfTurnossRelatedByIdAsociado as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfVasosQuery::create()
                        ->filterByPrimaryKeys($this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfVasossRelatedByIdUserModified !== null) {
                foreach ($this->collHbfVasossRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfVasosQuery::create()
                        ->filterByPrimaryKeys($this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfVasossRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfVasossRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \HbfVentasQuery::create()
                        ->filterByPrimaryKeys($this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfVentassRelatedByIdUserCreated !== null) {
                foreach ($this->collHbfVentassRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \HbfVentasQuery::create()
                        ->filterByPrimaryKeys($this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collHbfVentassRelatedByIdUserModified !== null) {
                foreach ($this->collHbfVentassRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfVentassRelatedByIdClienteScheduledForDeletion !== null) {
                if (!$this->hbfVentassRelatedByIdClienteScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfVentassRelatedByIdClienteScheduledForDeletion as $hbfVentasRelatedByIdCliente) {
                        // need to save related object because we set the relation to null
                        $hbfVentasRelatedByIdCliente->save($con);
                    }
                    $this->hbfVentassRelatedByIdClienteScheduledForDeletion = null;
                }
            }

            if ($this->collHbfVentassRelatedByIdCliente !== null) {
                foreach ($this->collHbfVentassRelatedByIdCliente as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CiUsuariosTableMap::COL_ID_USUARIO] = true;
        if (null !== $this->id_usuario) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CiUsuariosTableMap::COL_ID_USUARIO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'id_usuario';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'nombre';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APELLIDO)) {
            $modifiedColumns[':p' . $index++]  = 'apellido';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_USERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'username';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_FEC_NACIMIENTO)) {
            $modifiedColumns[':p' . $index++]  = 'fec_nacimiento';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_SEXO)) {
            $modifiedColumns[':p' . $index++]  = 'sexo';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_INVITADO_POR)) {
            $modifiedColumns[':p' . $index++]  = 'invitado_por';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_PHONE_NUMBER_1)) {
            $modifiedColumns[':p' . $index++]  = 'phone_number_1';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_PHONE_NUMBER_2)) {
            $modifiedColumns[':p' . $index++]  = 'phone_number_2';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1)) {
            $modifiedColumns[':p' . $index++]  = 'cellphone_number_1';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2)) {
            $modifiedColumns[':p' . $index++]  = 'cellphone_number_2';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_COD_ACCESO)) {
            $modifiedColumns[':p' . $index++]  = 'cod_acceso';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO)) {
            $modifiedColumns[':p' . $index++]  = 'id_option_tipo_asociado';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO)) {
            $modifiedColumns[':p' . $index++]  = 'id_option_nivel_asociado';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_CLUB)) {
            $modifiedColumns[':p' . $index++]  = 'id_club';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_TURNO)) {
            $modifiedColumns[':p' . $index++]  = 'id_turno';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_SESION)) {
            $modifiedColumns[':p' . $index++]  = 'id_sesion';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_OPCION_ROLE)) {
            $modifiedColumns[':p' . $index++]  = 'id_opcion_role';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_FOTO_PERFIL)) {
            $modifiedColumns[':p' . $index++]  = 'foto_perfil';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APP_MONITOR)) {
            $modifiedColumns[':p' . $index++]  = 'app_monitor';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APP_ORDERS)) {
            $modifiedColumns[':p' . $index++]  = 'app_orders';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APP_ADMIN)) {
            $modifiedColumns[':p' . $index++]  = 'app_admin';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_HERBALIFE_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'herbalife_key';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_TIPO_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'id_tipo_usuario';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO ci_usuarios (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_usuario':
                        $stmt->bindValue($identifier, $this->id_usuario, PDO::PARAM_INT);
                        break;
                    case 'nombre':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case 'apellido':
                        $stmt->bindValue($identifier, $this->apellido, PDO::PARAM_STR);
                        break;
                    case 'username':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'fec_nacimiento':
                        $stmt->bindValue($identifier, $this->fec_nacimiento ? $this->fec_nacimiento->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'sexo':
                        $stmt->bindValue($identifier, $this->sexo, PDO::PARAM_STR);
                        break;
                    case 'invitado_por':
                        $stmt->bindValue($identifier, $this->invitado_por, PDO::PARAM_INT);
                        break;
                    case 'phone_number_1':
                        $stmt->bindValue($identifier, $this->phone_number_1, PDO::PARAM_STR);
                        break;
                    case 'phone_number_2':
                        $stmt->bindValue($identifier, $this->phone_number_2, PDO::PARAM_STR);
                        break;
                    case 'cellphone_number_1':
                        $stmt->bindValue($identifier, $this->cellphone_number_1, PDO::PARAM_STR);
                        break;
                    case 'cellphone_number_2':
                        $stmt->bindValue($identifier, $this->cellphone_number_2, PDO::PARAM_STR);
                        break;
                    case 'cod_acceso':
                        $stmt->bindValue($identifier, $this->cod_acceso, PDO::PARAM_STR);
                        break;
                    case 'id_option_tipo_asociado':
                        $stmt->bindValue($identifier, $this->id_option_tipo_asociado, PDO::PARAM_INT);
                        break;
                    case 'id_option_nivel_asociado':
                        $stmt->bindValue($identifier, $this->id_option_nivel_asociado, PDO::PARAM_INT);
                        break;
                    case 'id_club':
                        $stmt->bindValue($identifier, $this->id_club, PDO::PARAM_INT);
                        break;
                    case 'id_turno':
                        $stmt->bindValue($identifier, $this->id_turno, PDO::PARAM_INT);
                        break;
                    case 'id_sesion':
                        $stmt->bindValue($identifier, $this->id_sesion, PDO::PARAM_INT);
                        break;
                    case 'id_opcion_role':
                        $stmt->bindValue($identifier, $this->id_opcion_role, PDO::PARAM_INT);
                        break;
                    case 'foto_perfil':
                        $stmt->bindValue($identifier, $this->foto_perfil, PDO::PARAM_INT);
                        break;
                    case 'app_monitor':
                        $stmt->bindValue($identifier, $this->app_monitor, PDO::PARAM_STR);
                        break;
                    case 'app_orders':
                        $stmt->bindValue($identifier, $this->app_orders, PDO::PARAM_STR);
                        break;
                    case 'app_admin':
                        $stmt->bindValue($identifier, $this->app_admin, PDO::PARAM_STR);
                        break;
                    case 'change_count':
                        $stmt->bindValue($identifier, $this->change_count, PDO::PARAM_INT);
                        break;
                    case 'herbalife_key':
                        $stmt->bindValue($identifier, $this->herbalife_key, PDO::PARAM_STR);
                        break;
                    case 'id_tipo_usuario':
                        $stmt->bindValue($identifier, $this->id_tipo_usuario, PDO::PARAM_INT);
                        break;
                    case 'estado':
                        $stmt->bindValue($identifier, $this->estado, PDO::PARAM_STR);
                        break;
                    case 'date_modified':
                        $stmt->bindValue($identifier, $this->date_modified ? $this->date_modified->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'date_created':
                        $stmt->bindValue($identifier, $this->date_created ? $this->date_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdUsuario($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CiUsuariosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdUsuario();
                break;
            case 1:
                return $this->getNombre();
                break;
            case 2:
                return $this->getApellido();
                break;
            case 3:
                return $this->getUsername();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getPassword();
                break;
            case 6:
                return $this->getFecNacimiento();
                break;
            case 7:
                return $this->getSexo();
                break;
            case 8:
                return $this->getInvitadoPor();
                break;
            case 9:
                return $this->getPhoneNumber1();
                break;
            case 10:
                return $this->getPhoneNumber2();
                break;
            case 11:
                return $this->getCellphoneNumber1();
                break;
            case 12:
                return $this->getCellphoneNumber2();
                break;
            case 13:
                return $this->getCodAcceso();
                break;
            case 14:
                return $this->getIdOptionTipoAsociado();
                break;
            case 15:
                return $this->getIdOptionNivelAsociado();
                break;
            case 16:
                return $this->getIdClub();
                break;
            case 17:
                return $this->getIdTurno();
                break;
            case 18:
                return $this->getIdSesion();
                break;
            case 19:
                return $this->getIdOpcionRole();
                break;
            case 20:
                return $this->getFotoPerfil();
                break;
            case 21:
                return $this->getAppMonitor();
                break;
            case 22:
                return $this->getAppOrders();
                break;
            case 23:
                return $this->getAppAdmin();
                break;
            case 24:
                return $this->getChangeCount();
                break;
            case 25:
                return $this->getHerbalifeKey();
                break;
            case 26:
                return $this->getIdTipoUsuario();
                break;
            case 27:
                return $this->getEstado();
                break;
            case 28:
                return $this->getDateModified();
                break;
            case 29:
                return $this->getDateCreated();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['CiUsuarios'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CiUsuarios'][$this->hashCode()] = true;
        $keys = CiUsuariosTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdUsuario(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getApellido(),
            $keys[3] => $this->getUsername(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getPassword(),
            $keys[6] => $this->getFecNacimiento(),
            $keys[7] => $this->getSexo(),
            $keys[8] => $this->getInvitadoPor(),
            $keys[9] => $this->getPhoneNumber1(),
            $keys[10] => $this->getPhoneNumber2(),
            $keys[11] => $this->getCellphoneNumber1(),
            $keys[12] => $this->getCellphoneNumber2(),
            $keys[13] => $this->getCodAcceso(),
            $keys[14] => $this->getIdOptionTipoAsociado(),
            $keys[15] => $this->getIdOptionNivelAsociado(),
            $keys[16] => $this->getIdClub(),
            $keys[17] => $this->getIdTurno(),
            $keys[18] => $this->getIdSesion(),
            $keys[19] => $this->getIdOpcionRole(),
            $keys[20] => $this->getFotoPerfil(),
            $keys[21] => $this->getAppMonitor(),
            $keys[22] => $this->getAppOrders(),
            $keys[23] => $this->getAppAdmin(),
            $keys[24] => $this->getChangeCount(),
            $keys[25] => $this->getHerbalifeKey(),
            $keys[26] => $this->getIdTipoUsuario(),
            $keys[27] => $this->getEstado(),
            $keys[28] => $this->getDateModified(),
            $keys[29] => $this->getDateCreated(),
        );
        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        if ($result[$keys[28]] instanceof \DateTimeInterface) {
            $result[$keys[28]] = $result[$keys[28]]->format('c');
        }

        if ($result[$keys[29]] instanceof \DateTimeInterface) {
            $result[$keys[29]] = $result[$keys[29]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCiOptionsRelatedByIdOptionTipoAsociado) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciOptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_options';
                        break;
                    default:
                        $key = 'CiOptions';
                }

                $result[$key] = $this->aCiOptionsRelatedByIdOptionTipoAsociado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiOptionsRelatedByIdOptionNivelAsociado) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciOptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_options';
                        break;
                    default:
                        $key = 'CiOptions';
                }

                $result[$key] = $this->aCiOptionsRelatedByIdOptionNivelAsociado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiUsuariosRelatedByInvitadoPor) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciUsuarios';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_usuarios';
                        break;
                    default:
                        $key = 'CiUsuarios';
                }

                $result[$key] = $this->aCiUsuariosRelatedByInvitadoPor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiOptionsRelatedByIdOpcionRole) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciOptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_options';
                        break;
                    default:
                        $key = 'CiOptions';
                }

                $result[$key] = $this->aCiOptionsRelatedByIdOpcionRole->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aHbfTurnosRelatedByIdTurno) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfTurnos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_turnos';
                        break;
                    default:
                        $key = 'HbfTurnos';
                }

                $result[$key] = $this->aHbfTurnosRelatedByIdTurno->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aHbfSesionesRelatedByIdSesion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfSesiones';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_sesiones';
                        break;
                    default:
                        $key = 'HbfSesiones';
                }

                $result[$key] = $this->aHbfSesionesRelatedByIdSesion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiOptionsRelatedByIdTipoUsuario) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciOptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_options';
                        break;
                    default:
                        $key = 'CiOptions';
                }

                $result[$key] = $this->aCiOptionsRelatedByIdTipoUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aHbfClubsRelatedByIdClub) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfClubs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_clubs';
                        break;
                    default:
                        $key = 'HbfClubs';
                }

                $result[$key] = $this->aHbfClubsRelatedByIdClub->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCiModulossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciModuloss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_moduloss';
                        break;
                    default:
                        $key = 'CiModuloss';
                }

                $result[$key] = $this->collCiModulossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiModulossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciModuloss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_moduloss';
                        break;
                    default:
                        $key = 'CiModuloss';
                }

                $result[$key] = $this->collCiModulossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiOptionssRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciOptionss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_optionss';
                        break;
                    default:
                        $key = 'CiOptionss';
                }

                $result[$key] = $this->collCiOptionssRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiOptionssRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciOptionss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_optionss';
                        break;
                    default:
                        $key = 'CiOptionss';
                }

                $result[$key] = $this->collCiOptionssRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiSessionss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciSessionss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_sessionss';
                        break;
                    default:
                        $key = 'CiSessionss';
                }

                $result[$key] = $this->collCiSessionss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiSettingssRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciSettingss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_settingss';
                        break;
                    default:
                        $key = 'CiSettingss';
                }

                $result[$key] = $this->collCiSettingssRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiSettingssRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciSettingss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_settingss';
                        break;
                    default:
                        $key = 'CiSettingss';
                }

                $result[$key] = $this->collCiSettingssRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiUsuariossRelatedByIdUsuario) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciUsuarioss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_usuarioss';
                        break;
                    default:
                        $key = 'CiUsuarioss';
                }

                $result[$key] = $this->collCiUsuariossRelatedByIdUsuario->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfClubssRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfClubss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_clubss';
                        break;
                    default:
                        $key = 'HbfClubss';
                }

                $result[$key] = $this->collHbfClubssRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfClubssRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfClubss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_clubss';
                        break;
                    default:
                        $key = 'HbfClubss';
                }

                $result[$key] = $this->collHbfClubssRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfComandassRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfComandass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_comandass';
                        break;
                    default:
                        $key = 'HbfComandass';
                }

                $result[$key] = $this->collHbfComandassRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfComandassRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfComandass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_comandass';
                        break;
                    default:
                        $key = 'HbfComandass';
                }

                $result[$key] = $this->collHbfComandassRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfComandassRelatedByIdCliente) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfComandass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_comandass';
                        break;
                    default:
                        $key = 'HbfComandass';
                }

                $result[$key] = $this->collHbfComandassRelatedByIdCliente->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfDetallesPedidossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfDetallesPedidoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_detalles_pedidoss';
                        break;
                    default:
                        $key = 'HbfDetallesPedidoss';
                }

                $result[$key] = $this->collHbfDetallesPedidossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfDetallesPedidossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfDetallesPedidoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_detalles_pedidoss';
                        break;
                    default:
                        $key = 'HbfDetallesPedidoss';
                }

                $result[$key] = $this->collHbfDetallesPedidossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfEgresossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfEgresoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_egresoss';
                        break;
                    default:
                        $key = 'HbfEgresoss';
                }

                $result[$key] = $this->collHbfEgresossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfEgresossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfEgresoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_egresoss';
                        break;
                    default:
                        $key = 'HbfEgresoss';
                }

                $result[$key] = $this->collHbfEgresossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfEgresossRelatedByIdCliente) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfEgresoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_egresoss';
                        break;
                    default:
                        $key = 'HbfEgresoss';
                }

                $result[$key] = $this->collHbfEgresossRelatedByIdCliente->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfIngresossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfIngresoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_ingresoss';
                        break;
                    default:
                        $key = 'HbfIngresoss';
                }

                $result[$key] = $this->collHbfIngresossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfIngresossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfIngresoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_ingresoss';
                        break;
                    default:
                        $key = 'HbfIngresoss';
                }

                $result[$key] = $this->collHbfIngresossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfIngresossRelatedByIdCliente) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfIngresoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_ingresoss';
                        break;
                    default:
                        $key = 'HbfIngresoss';
                }

                $result[$key] = $this->collHbfIngresossRelatedByIdCliente->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfPorcionessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfPorcioness';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_porcioness';
                        break;
                    default:
                        $key = 'HbfPorcioness';
                }

                $result[$key] = $this->collHbfPorcionessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfPorcionessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfPorcioness';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_porcioness';
                        break;
                    default:
                        $key = 'HbfPorcioness';
                }

                $result[$key] = $this->collHbfPorcionessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfPrepagossRelatedByIdCliente) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfPrepagoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_prepagoss';
                        break;
                    default:
                        $key = 'HbfPrepagoss';
                }

                $result[$key] = $this->collHbfPrepagossRelatedByIdCliente->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfPrepagossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfPrepagoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_prepagoss';
                        break;
                    default:
                        $key = 'HbfPrepagoss';
                }

                $result[$key] = $this->collHbfPrepagossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfPrepagossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfPrepagoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_prepagoss';
                        break;
                    default:
                        $key = 'HbfPrepagoss';
                }

                $result[$key] = $this->collHbfPrepagossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfProductossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfProductoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_productoss';
                        break;
                    default:
                        $key = 'HbfProductoss';
                }

                $result[$key] = $this->collHbfProductossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfProductossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfProductoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_productoss';
                        break;
                    default:
                        $key = 'HbfProductoss';
                }

                $result[$key] = $this->collHbfProductossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfSesionessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfSesioness';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_sesioness';
                        break;
                    default:
                        $key = 'HbfSesioness';
                }

                $result[$key] = $this->collHbfSesionessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfSesionessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfSesioness';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_sesioness';
                        break;
                    default:
                        $key = 'HbfSesioness';
                }

                $result[$key] = $this->collHbfSesionessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfSesionessRelatedByIdAsociado) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfSesioness';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_sesioness';
                        break;
                    default:
                        $key = 'HbfSesioness';
                }

                $result[$key] = $this->collHbfSesionessRelatedByIdAsociado->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfTurnossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfTurnoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_turnoss';
                        break;
                    default:
                        $key = 'HbfTurnoss';
                }

                $result[$key] = $this->collHbfTurnossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfTurnossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfTurnoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_turnoss';
                        break;
                    default:
                        $key = 'HbfTurnoss';
                }

                $result[$key] = $this->collHbfTurnossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfTurnossRelatedByIdAsociado) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfTurnoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_turnoss';
                        break;
                    default:
                        $key = 'HbfTurnoss';
                }

                $result[$key] = $this->collHbfTurnossRelatedByIdAsociado->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfVasossRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfVasoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_vasoss';
                        break;
                    default:
                        $key = 'HbfVasoss';
                }

                $result[$key] = $this->collHbfVasossRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfVasossRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfVasoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_vasoss';
                        break;
                    default:
                        $key = 'HbfVasoss';
                }

                $result[$key] = $this->collHbfVasossRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfVentassRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfVentass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_ventass';
                        break;
                    default:
                        $key = 'HbfVentass';
                }

                $result[$key] = $this->collHbfVentassRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfVentassRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfVentass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_ventass';
                        break;
                    default:
                        $key = 'HbfVentass';
                }

                $result[$key] = $this->collHbfVentassRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfVentassRelatedByIdCliente) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfVentass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_ventass';
                        break;
                    default:
                        $key = 'HbfVentass';
                }

                $result[$key] = $this->collHbfVentassRelatedByIdCliente->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\CiUsuarios
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CiUsuariosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CiUsuarios
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdUsuario($value);
                break;
            case 1:
                $this->setNombre($value);
                break;
            case 2:
                $this->setApellido($value);
                break;
            case 3:
                $this->setUsername($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $this->setPassword($value);
                break;
            case 6:
                $this->setFecNacimiento($value);
                break;
            case 7:
                $this->setSexo($value);
                break;
            case 8:
                $this->setInvitadoPor($value);
                break;
            case 9:
                $this->setPhoneNumber1($value);
                break;
            case 10:
                $this->setPhoneNumber2($value);
                break;
            case 11:
                $this->setCellphoneNumber1($value);
                break;
            case 12:
                $this->setCellphoneNumber2($value);
                break;
            case 13:
                $this->setCodAcceso($value);
                break;
            case 14:
                $this->setIdOptionTipoAsociado($value);
                break;
            case 15:
                $this->setIdOptionNivelAsociado($value);
                break;
            case 16:
                $this->setIdClub($value);
                break;
            case 17:
                $this->setIdTurno($value);
                break;
            case 18:
                $this->setIdSesion($value);
                break;
            case 19:
                $this->setIdOpcionRole($value);
                break;
            case 20:
                $this->setFotoPerfil($value);
                break;
            case 21:
                $this->setAppMonitor($value);
                break;
            case 22:
                $this->setAppOrders($value);
                break;
            case 23:
                $this->setAppAdmin($value);
                break;
            case 24:
                $this->setChangeCount($value);
                break;
            case 25:
                $this->setHerbalifeKey($value);
                break;
            case 26:
                $this->setIdTipoUsuario($value);
                break;
            case 27:
                $this->setEstado($value);
                break;
            case 28:
                $this->setDateModified($value);
                break;
            case 29:
                $this->setDateCreated($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CiUsuariosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdUsuario($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNombre($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setApellido($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUsername($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEmail($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPassword($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFecNacimiento($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSexo($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setInvitadoPor($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPhoneNumber1($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPhoneNumber2($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCellphoneNumber1($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCellphoneNumber2($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCodAcceso($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setIdOptionTipoAsociado($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setIdOptionNivelAsociado($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIdClub($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setIdTurno($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setIdSesion($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setIdOpcionRole($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setFotoPerfil($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setAppMonitor($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setAppOrders($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setAppAdmin($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setChangeCount($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setHerbalifeKey($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setIdTipoUsuario($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setEstado($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setDateModified($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setDateCreated($arr[$keys[29]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\CiUsuarios The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CiUsuariosTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_USUARIO)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_USUARIO, $this->id_usuario);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_NOMBRE)) {
            $criteria->add(CiUsuariosTableMap::COL_NOMBRE, $this->nombre);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APELLIDO)) {
            $criteria->add(CiUsuariosTableMap::COL_APELLIDO, $this->apellido);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_USERNAME)) {
            $criteria->add(CiUsuariosTableMap::COL_USERNAME, $this->username);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_EMAIL)) {
            $criteria->add(CiUsuariosTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_PASSWORD)) {
            $criteria->add(CiUsuariosTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_FEC_NACIMIENTO)) {
            $criteria->add(CiUsuariosTableMap::COL_FEC_NACIMIENTO, $this->fec_nacimiento);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_SEXO)) {
            $criteria->add(CiUsuariosTableMap::COL_SEXO, $this->sexo);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_INVITADO_POR)) {
            $criteria->add(CiUsuariosTableMap::COL_INVITADO_POR, $this->invitado_por);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_PHONE_NUMBER_1)) {
            $criteria->add(CiUsuariosTableMap::COL_PHONE_NUMBER_1, $this->phone_number_1);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_PHONE_NUMBER_2)) {
            $criteria->add(CiUsuariosTableMap::COL_PHONE_NUMBER_2, $this->phone_number_2);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1)) {
            $criteria->add(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1, $this->cellphone_number_1);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2)) {
            $criteria->add(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2, $this->cellphone_number_2);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_COD_ACCESO)) {
            $criteria->add(CiUsuariosTableMap::COL_COD_ACCESO, $this->cod_acceso);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO, $this->id_option_tipo_asociado);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO, $this->id_option_nivel_asociado);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_CLUB)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_CLUB, $this->id_club);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_TURNO)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_TURNO, $this->id_turno);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_SESION)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_SESION, $this->id_sesion);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_OPCION_ROLE)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_OPCION_ROLE, $this->id_opcion_role);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_FOTO_PERFIL)) {
            $criteria->add(CiUsuariosTableMap::COL_FOTO_PERFIL, $this->foto_perfil);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APP_MONITOR)) {
            $criteria->add(CiUsuariosTableMap::COL_APP_MONITOR, $this->app_monitor);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APP_ORDERS)) {
            $criteria->add(CiUsuariosTableMap::COL_APP_ORDERS, $this->app_orders);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_APP_ADMIN)) {
            $criteria->add(CiUsuariosTableMap::COL_APP_ADMIN, $this->app_admin);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(CiUsuariosTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_HERBALIFE_KEY)) {
            $criteria->add(CiUsuariosTableMap::COL_HERBALIFE_KEY, $this->herbalife_key);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ID_TIPO_USUARIO)) {
            $criteria->add(CiUsuariosTableMap::COL_ID_TIPO_USUARIO, $this->id_tipo_usuario);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_ESTADO)) {
            $criteria->add(CiUsuariosTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(CiUsuariosTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(CiUsuariosTableMap::COL_DATE_CREATED)) {
            $criteria->add(CiUsuariosTableMap::COL_DATE_CREATED, $this->date_created);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCiUsuariosQuery::create();
        $criteria->add(CiUsuariosTableMap::COL_ID_USUARIO, $this->id_usuario);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdUsuario();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdUsuario();
    }

    /**
     * Generic method to set the primary key (id_usuario column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdUsuario($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdUsuario();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CiUsuarios (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setApellido($this->getApellido());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setFecNacimiento($this->getFecNacimiento());
        $copyObj->setSexo($this->getSexo());
        $copyObj->setInvitadoPor($this->getInvitadoPor());
        $copyObj->setPhoneNumber1($this->getPhoneNumber1());
        $copyObj->setPhoneNumber2($this->getPhoneNumber2());
        $copyObj->setCellphoneNumber1($this->getCellphoneNumber1());
        $copyObj->setCellphoneNumber2($this->getCellphoneNumber2());
        $copyObj->setCodAcceso($this->getCodAcceso());
        $copyObj->setIdOptionTipoAsociado($this->getIdOptionTipoAsociado());
        $copyObj->setIdOptionNivelAsociado($this->getIdOptionNivelAsociado());
        $copyObj->setIdClub($this->getIdClub());
        $copyObj->setIdTurno($this->getIdTurno());
        $copyObj->setIdSesion($this->getIdSesion());
        $copyObj->setIdOpcionRole($this->getIdOpcionRole());
        $copyObj->setFotoPerfil($this->getFotoPerfil());
        $copyObj->setAppMonitor($this->getAppMonitor());
        $copyObj->setAppOrders($this->getAppOrders());
        $copyObj->setAppAdmin($this->getAppAdmin());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setHerbalifeKey($this->getHerbalifeKey());
        $copyObj->setIdTipoUsuario($this->getIdTipoUsuario());
        $copyObj->setEstado($this->getEstado());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCiModulossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiModulosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiModulossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiModulosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiOptionssRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiOptionsRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiOptionssRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiOptionsRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiSessionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiSessions($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiSettingssRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiSettingsRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiSettingssRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiSettingsRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdUsuario() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdUsuario($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfClubssRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfClubsRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfClubssRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfClubsRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfComandassRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfComandasRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfComandassRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfComandasRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfComandassRelatedByIdCliente() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfComandasRelatedByIdCliente($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfDetallesPedidossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfDetallesPedidosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfDetallesPedidossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfDetallesPedidosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfEgresossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfEgresosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfEgresossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfEgresosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfEgresossRelatedByIdCliente() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfEgresosRelatedByIdCliente($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfIngresossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfIngresosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfIngresossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfIngresosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfIngresossRelatedByIdCliente() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfIngresosRelatedByIdCliente($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfPorcionessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPorcionesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfPorcionessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPorcionesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfPrepagossRelatedByIdCliente() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPrepagosRelatedByIdCliente($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfPrepagossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPrepagosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfPrepagossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPrepagosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfProductossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfProductosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfProductossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfProductosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfSesionessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfSesionesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfSesionessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfSesionesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfSesionessRelatedByIdAsociado() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfSesionesRelatedByIdAsociado($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfTurnossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfTurnosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfTurnossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfTurnosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfTurnossRelatedByIdAsociado() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfTurnosRelatedByIdAsociado($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfVasossRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfVasosRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfVasossRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfVasosRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfVentassRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfVentasRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfVentassRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfVentasRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfVentassRelatedByIdCliente() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfVentasRelatedByIdCliente($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdUsuario(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \CiUsuarios Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdOptionTipoAsociado(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOptionTipoAsociado(NULL);
        } else {
            $this->setIdOptionTipoAsociado($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdOptionTipoAsociado = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdOptionTipoAsociado($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCiOptions object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCiOptions The associated ChildCiOptions object.
     * @throws PropelException
     */
    public function getCiOptionsRelatedByIdOptionTipoAsociado(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdOptionTipoAsociado === null && ($this->id_option_tipo_asociado != 0)) {
            $this->aCiOptionsRelatedByIdOptionTipoAsociado = ChildCiOptionsQuery::create()->findPk($this->id_option_tipo_asociado, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdOptionTipoAsociado->addCiUsuariossRelatedByIdOptionTipoAsociado($this);
             */
        }

        return $this->aCiOptionsRelatedByIdOptionTipoAsociado;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdOptionNivelAsociado(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOptionNivelAsociado(NULL);
        } else {
            $this->setIdOptionNivelAsociado($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdOptionNivelAsociado = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdOptionNivelAsociado($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCiOptions object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCiOptions The associated ChildCiOptions object.
     * @throws PropelException
     */
    public function getCiOptionsRelatedByIdOptionNivelAsociado(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdOptionNivelAsociado === null && ($this->id_option_nivel_asociado != 0)) {
            $this->aCiOptionsRelatedByIdOptionNivelAsociado = ChildCiOptionsQuery::create()->findPk($this->id_option_nivel_asociado, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdOptionNivelAsociado->addCiUsuariossRelatedByIdOptionNivelAsociado($this);
             */
        }

        return $this->aCiOptionsRelatedByIdOptionNivelAsociado;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiUsuariosRelatedByInvitadoPor(ChildCiUsuarios $v = null)
    {
        if ($v === null) {
            $this->setInvitadoPor(NULL);
        } else {
            $this->setInvitadoPor($v->getIdUsuario());
        }

        $this->aCiUsuariosRelatedByInvitadoPor = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiUsuarios object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdUsuario($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCiUsuarios object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCiUsuarios The associated ChildCiUsuarios object.
     * @throws PropelException
     */
    public function getCiUsuariosRelatedByInvitadoPor(ConnectionInterface $con = null)
    {
        if ($this->aCiUsuariosRelatedByInvitadoPor === null && ($this->invitado_por != 0)) {
            $this->aCiUsuariosRelatedByInvitadoPor = ChildCiUsuariosQuery::create()->findPk($this->invitado_por, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiUsuariosRelatedByInvitadoPor->addCiUsuariossRelatedByIdUsuario($this);
             */
        }

        return $this->aCiUsuariosRelatedByInvitadoPor;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdOpcionRole(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOpcionRole(NULL);
        } else {
            $this->setIdOpcionRole($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdOpcionRole = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdOpcionRole($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCiOptions object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCiOptions The associated ChildCiOptions object.
     * @throws PropelException
     */
    public function getCiOptionsRelatedByIdOpcionRole(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdOpcionRole === null && ($this->id_opcion_role != 0)) {
            $this->aCiOptionsRelatedByIdOpcionRole = ChildCiOptionsQuery::create()->findPk($this->id_opcion_role, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdOpcionRole->addCiUsuariossRelatedByIdOpcionRole($this);
             */
        }

        return $this->aCiOptionsRelatedByIdOpcionRole;
    }

    /**
     * Declares an association between this object and a ChildHbfTurnos object.
     *
     * @param  ChildHbfTurnos $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfTurnosRelatedByIdTurno(ChildHbfTurnos $v = null)
    {
        if ($v === null) {
            $this->setIdTurno(NULL);
        } else {
            $this->setIdTurno($v->getIdTurno());
        }

        $this->aHbfTurnosRelatedByIdTurno = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfTurnos object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdTurno($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildHbfTurnos object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildHbfTurnos The associated ChildHbfTurnos object.
     * @throws PropelException
     */
    public function getHbfTurnosRelatedByIdTurno(ConnectionInterface $con = null)
    {
        if ($this->aHbfTurnosRelatedByIdTurno === null && ($this->id_turno != 0)) {
            $this->aHbfTurnosRelatedByIdTurno = ChildHbfTurnosQuery::create()->findPk($this->id_turno, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfTurnosRelatedByIdTurno->addCiUsuariossRelatedByIdTurno($this);
             */
        }

        return $this->aHbfTurnosRelatedByIdTurno;
    }

    /**
     * Declares an association between this object and a ChildHbfSesiones object.
     *
     * @param  ChildHbfSesiones $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfSesionesRelatedByIdSesion(ChildHbfSesiones $v = null)
    {
        if ($v === null) {
            $this->setIdSesion(NULL);
        } else {
            $this->setIdSesion($v->getIdSesion());
        }

        $this->aHbfSesionesRelatedByIdSesion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfSesiones object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdSesion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildHbfSesiones object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildHbfSesiones The associated ChildHbfSesiones object.
     * @throws PropelException
     */
    public function getHbfSesionesRelatedByIdSesion(ConnectionInterface $con = null)
    {
        if ($this->aHbfSesionesRelatedByIdSesion === null && ($this->id_sesion != 0)) {
            $this->aHbfSesionesRelatedByIdSesion = ChildHbfSesionesQuery::create()->findPk($this->id_sesion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfSesionesRelatedByIdSesion->addCiUsuariossRelatedByIdSesion($this);
             */
        }

        return $this->aHbfSesionesRelatedByIdSesion;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdTipoUsuario(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdTipoUsuario(NULL);
        } else {
            $this->setIdTipoUsuario($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdTipoUsuario = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdTipoUsuario($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCiOptions object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCiOptions The associated ChildCiOptions object.
     * @throws PropelException
     */
    public function getCiOptionsRelatedByIdTipoUsuario(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdTipoUsuario === null && ($this->id_tipo_usuario != 0)) {
            $this->aCiOptionsRelatedByIdTipoUsuario = ChildCiOptionsQuery::create()->findPk($this->id_tipo_usuario, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdTipoUsuario->addCiUsuariossRelatedByIdTipoUsuario($this);
             */
        }

        return $this->aCiOptionsRelatedByIdTipoUsuario;
    }

    /**
     * Declares an association between this object and a ChildHbfClubs object.
     *
     * @param  ChildHbfClubs $v
     * @return $this|\CiUsuarios The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfClubsRelatedByIdClub(ChildHbfClubs $v = null)
    {
        if ($v === null) {
            $this->setIdClub(NULL);
        } else {
            $this->setIdClub($v->getIdClub());
        }

        $this->aHbfClubsRelatedByIdClub = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfClubs object, it will not be re-added.
        if ($v !== null) {
            $v->addCiUsuariosRelatedByIdClub($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildHbfClubs object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildHbfClubs The associated ChildHbfClubs object.
     * @throws PropelException
     */
    public function getHbfClubsRelatedByIdClub(ConnectionInterface $con = null)
    {
        if ($this->aHbfClubsRelatedByIdClub === null && ($this->id_club != 0)) {
            $this->aHbfClubsRelatedByIdClub = ChildHbfClubsQuery::create()->findPk($this->id_club, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfClubsRelatedByIdClub->addCiUsuariossRelatedByIdClub($this);
             */
        }

        return $this->aHbfClubsRelatedByIdClub;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CiModulosRelatedByIdUserCreated' == $relationName) {
            $this->initCiModulossRelatedByIdUserCreated();
            return;
        }
        if ('CiModulosRelatedByIdUserModified' == $relationName) {
            $this->initCiModulossRelatedByIdUserModified();
            return;
        }
        if ('CiOptionsRelatedByIdUserCreated' == $relationName) {
            $this->initCiOptionssRelatedByIdUserCreated();
            return;
        }
        if ('CiOptionsRelatedByIdUserModified' == $relationName) {
            $this->initCiOptionssRelatedByIdUserModified();
            return;
        }
        if ('CiSessions' == $relationName) {
            $this->initCiSessionss();
            return;
        }
        if ('CiSettingsRelatedByIdUserCreated' == $relationName) {
            $this->initCiSettingssRelatedByIdUserCreated();
            return;
        }
        if ('CiSettingsRelatedByIdUserModified' == $relationName) {
            $this->initCiSettingssRelatedByIdUserModified();
            return;
        }
        if ('CiUsuariosRelatedByIdUsuario' == $relationName) {
            $this->initCiUsuariossRelatedByIdUsuario();
            return;
        }
        if ('HbfClubsRelatedByIdUserCreated' == $relationName) {
            $this->initHbfClubssRelatedByIdUserCreated();
            return;
        }
        if ('HbfClubsRelatedByIdUserModified' == $relationName) {
            $this->initHbfClubssRelatedByIdUserModified();
            return;
        }
        if ('HbfComandasRelatedByIdUserCreated' == $relationName) {
            $this->initHbfComandassRelatedByIdUserCreated();
            return;
        }
        if ('HbfComandasRelatedByIdUserModified' == $relationName) {
            $this->initHbfComandassRelatedByIdUserModified();
            return;
        }
        if ('HbfComandasRelatedByIdCliente' == $relationName) {
            $this->initHbfComandassRelatedByIdCliente();
            return;
        }
        if ('HbfDetallesPedidosRelatedByIdUserCreated' == $relationName) {
            $this->initHbfDetallesPedidossRelatedByIdUserCreated();
            return;
        }
        if ('HbfDetallesPedidosRelatedByIdUserModified' == $relationName) {
            $this->initHbfDetallesPedidossRelatedByIdUserModified();
            return;
        }
        if ('HbfEgresosRelatedByIdUserCreated' == $relationName) {
            $this->initHbfEgresossRelatedByIdUserCreated();
            return;
        }
        if ('HbfEgresosRelatedByIdUserModified' == $relationName) {
            $this->initHbfEgresossRelatedByIdUserModified();
            return;
        }
        if ('HbfEgresosRelatedByIdCliente' == $relationName) {
            $this->initHbfEgresossRelatedByIdCliente();
            return;
        }
        if ('HbfIngresosRelatedByIdUserCreated' == $relationName) {
            $this->initHbfIngresossRelatedByIdUserCreated();
            return;
        }
        if ('HbfIngresosRelatedByIdUserModified' == $relationName) {
            $this->initHbfIngresossRelatedByIdUserModified();
            return;
        }
        if ('HbfIngresosRelatedByIdCliente' == $relationName) {
            $this->initHbfIngresossRelatedByIdCliente();
            return;
        }
        if ('HbfPorcionesRelatedByIdUserCreated' == $relationName) {
            $this->initHbfPorcionessRelatedByIdUserCreated();
            return;
        }
        if ('HbfPorcionesRelatedByIdUserModified' == $relationName) {
            $this->initHbfPorcionessRelatedByIdUserModified();
            return;
        }
        if ('HbfPrepagosRelatedByIdCliente' == $relationName) {
            $this->initHbfPrepagossRelatedByIdCliente();
            return;
        }
        if ('HbfPrepagosRelatedByIdUserCreated' == $relationName) {
            $this->initHbfPrepagossRelatedByIdUserCreated();
            return;
        }
        if ('HbfPrepagosRelatedByIdUserModified' == $relationName) {
            $this->initHbfPrepagossRelatedByIdUserModified();
            return;
        }
        if ('HbfProductosRelatedByIdUserCreated' == $relationName) {
            $this->initHbfProductossRelatedByIdUserCreated();
            return;
        }
        if ('HbfProductosRelatedByIdUserModified' == $relationName) {
            $this->initHbfProductossRelatedByIdUserModified();
            return;
        }
        if ('HbfSesionesRelatedByIdUserCreated' == $relationName) {
            $this->initHbfSesionessRelatedByIdUserCreated();
            return;
        }
        if ('HbfSesionesRelatedByIdUserModified' == $relationName) {
            $this->initHbfSesionessRelatedByIdUserModified();
            return;
        }
        if ('HbfSesionesRelatedByIdAsociado' == $relationName) {
            $this->initHbfSesionessRelatedByIdAsociado();
            return;
        }
        if ('HbfTurnosRelatedByIdUserCreated' == $relationName) {
            $this->initHbfTurnossRelatedByIdUserCreated();
            return;
        }
        if ('HbfTurnosRelatedByIdUserModified' == $relationName) {
            $this->initHbfTurnossRelatedByIdUserModified();
            return;
        }
        if ('HbfTurnosRelatedByIdAsociado' == $relationName) {
            $this->initHbfTurnossRelatedByIdAsociado();
            return;
        }
        if ('HbfVasosRelatedByIdUserModified' == $relationName) {
            $this->initHbfVasossRelatedByIdUserModified();
            return;
        }
        if ('HbfVasosRelatedByIdUserCreated' == $relationName) {
            $this->initHbfVasossRelatedByIdUserCreated();
            return;
        }
        if ('HbfVentasRelatedByIdUserCreated' == $relationName) {
            $this->initHbfVentassRelatedByIdUserCreated();
            return;
        }
        if ('HbfVentasRelatedByIdUserModified' == $relationName) {
            $this->initHbfVentassRelatedByIdUserModified();
            return;
        }
        if ('HbfVentasRelatedByIdCliente' == $relationName) {
            $this->initHbfVentassRelatedByIdCliente();
            return;
        }
    }

    /**
     * Clears out the collCiModulossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiModulossRelatedByIdUserCreated()
     */
    public function clearCiModulossRelatedByIdUserCreated()
    {
        $this->collCiModulossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiModulossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialCiModulossRelatedByIdUserCreated($v = true)
    {
        $this->collCiModulossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collCiModulossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collCiModulossRelatedByIdUserCreated collection to an empty array (like clearcollCiModulossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiModulossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collCiModulossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiModulosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiModulossRelatedByIdUserCreated = new $collectionClassName;
        $this->collCiModulossRelatedByIdUserCreated->setModel('\CiModulos');
    }

    /**
     * Gets an array of ChildCiModulos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     * @throws PropelException
     */
    public function getCiModulossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdUserCreated) {
                // return empty collection
                $this->initCiModulossRelatedByIdUserCreated();
            } else {
                $collCiModulossRelatedByIdUserCreated = ChildCiModulosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiModulossRelatedByIdUserCreatedPartial && count($collCiModulossRelatedByIdUserCreated)) {
                        $this->initCiModulossRelatedByIdUserCreated(false);

                        foreach ($collCiModulossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collCiModulossRelatedByIdUserCreated->contains($obj)) {
                                $this->collCiModulossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collCiModulossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collCiModulossRelatedByIdUserCreated;
                }

                if ($partial && $this->collCiModulossRelatedByIdUserCreated) {
                    foreach ($this->collCiModulossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collCiModulossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collCiModulossRelatedByIdUserCreated = $collCiModulossRelatedByIdUserCreated;
                $this->collCiModulossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collCiModulossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildCiModulos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciModulossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiModulossRelatedByIdUserCreated(Collection $ciModulossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildCiModulos[] $ciModulossRelatedByIdUserCreatedToDelete */
        $ciModulossRelatedByIdUserCreatedToDelete = $this->getCiModulossRelatedByIdUserCreated(new Criteria(), $con)->diff($ciModulossRelatedByIdUserCreated);


        $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion = $ciModulossRelatedByIdUserCreatedToDelete;

        foreach ($ciModulossRelatedByIdUserCreatedToDelete as $ciModulosRelatedByIdUserCreatedRemoved) {
            $ciModulosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collCiModulossRelatedByIdUserCreated = null;
        foreach ($ciModulossRelatedByIdUserCreated as $ciModulosRelatedByIdUserCreated) {
            $this->addCiModulosRelatedByIdUserCreated($ciModulosRelatedByIdUserCreated);
        }

        $this->collCiModulossRelatedByIdUserCreated = $ciModulossRelatedByIdUserCreated;
        $this->collCiModulossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiModulos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiModulos objects.
     * @throws PropelException
     */
    public function countCiModulossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiModulossRelatedByIdUserCreated());
            }

            $query = ChildCiModulosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collCiModulossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildCiModulos object to this object
     * through the ChildCiModulos foreign key attribute.
     *
     * @param  ChildCiModulos $l ChildCiModulos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiModulosRelatedByIdUserCreated(ChildCiModulos $l)
    {
        if ($this->collCiModulossRelatedByIdUserCreated === null) {
            $this->initCiModulossRelatedByIdUserCreated();
            $this->collCiModulossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collCiModulossRelatedByIdUserCreated->contains($l)) {
            $this->doAddCiModulosRelatedByIdUserCreated($l);

            if ($this->ciModulossRelatedByIdUserCreatedScheduledForDeletion and $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion->remove($this->ciModulossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiModulos $ciModulosRelatedByIdUserCreated The ChildCiModulos object to add.
     */
    protected function doAddCiModulosRelatedByIdUserCreated(ChildCiModulos $ciModulosRelatedByIdUserCreated)
    {
        $this->collCiModulossRelatedByIdUserCreated[]= $ciModulosRelatedByIdUserCreated;
        $ciModulosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildCiModulos $ciModulosRelatedByIdUserCreated The ChildCiModulos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiModulosRelatedByIdUserCreated(ChildCiModulos $ciModulosRelatedByIdUserCreated)
    {
        if ($this->getCiModulossRelatedByIdUserCreated()->contains($ciModulosRelatedByIdUserCreated)) {
            $pos = $this->collCiModulossRelatedByIdUserCreated->search($ciModulosRelatedByIdUserCreated);
            $this->collCiModulossRelatedByIdUserCreated->remove($pos);
            if (null === $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collCiModulossRelatedByIdUserCreated;
                $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->ciModulossRelatedByIdUserCreatedScheduledForDeletion[]= clone $ciModulosRelatedByIdUserCreated;
            $ciModulosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiModulossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdUserCreatedJoinCiOptionsRelatedByIdOpcionModulo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOpcionModulo', $joinBehavior);

        return $this->getCiModulossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiModulossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdUserCreatedJoinCiOptionsRelatedByIdOpcionRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOpcionRoles', $joinBehavior);

        return $this->getCiModulossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collCiModulossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiModulossRelatedByIdUserModified()
     */
    public function clearCiModulossRelatedByIdUserModified()
    {
        $this->collCiModulossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiModulossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialCiModulossRelatedByIdUserModified($v = true)
    {
        $this->collCiModulossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collCiModulossRelatedByIdUserModified collection.
     *
     * By default this just sets the collCiModulossRelatedByIdUserModified collection to an empty array (like clearcollCiModulossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiModulossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collCiModulossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiModulosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiModulossRelatedByIdUserModified = new $collectionClassName;
        $this->collCiModulossRelatedByIdUserModified->setModel('\CiModulos');
    }

    /**
     * Gets an array of ChildCiModulos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     * @throws PropelException
     */
    public function getCiModulossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdUserModified) {
                // return empty collection
                $this->initCiModulossRelatedByIdUserModified();
            } else {
                $collCiModulossRelatedByIdUserModified = ChildCiModulosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiModulossRelatedByIdUserModifiedPartial && count($collCiModulossRelatedByIdUserModified)) {
                        $this->initCiModulossRelatedByIdUserModified(false);

                        foreach ($collCiModulossRelatedByIdUserModified as $obj) {
                            if (false == $this->collCiModulossRelatedByIdUserModified->contains($obj)) {
                                $this->collCiModulossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collCiModulossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collCiModulossRelatedByIdUserModified;
                }

                if ($partial && $this->collCiModulossRelatedByIdUserModified) {
                    foreach ($this->collCiModulossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collCiModulossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collCiModulossRelatedByIdUserModified = $collCiModulossRelatedByIdUserModified;
                $this->collCiModulossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collCiModulossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildCiModulos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciModulossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiModulossRelatedByIdUserModified(Collection $ciModulossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildCiModulos[] $ciModulossRelatedByIdUserModifiedToDelete */
        $ciModulossRelatedByIdUserModifiedToDelete = $this->getCiModulossRelatedByIdUserModified(new Criteria(), $con)->diff($ciModulossRelatedByIdUserModified);


        $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion = $ciModulossRelatedByIdUserModifiedToDelete;

        foreach ($ciModulossRelatedByIdUserModifiedToDelete as $ciModulosRelatedByIdUserModifiedRemoved) {
            $ciModulosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collCiModulossRelatedByIdUserModified = null;
        foreach ($ciModulossRelatedByIdUserModified as $ciModulosRelatedByIdUserModified) {
            $this->addCiModulosRelatedByIdUserModified($ciModulosRelatedByIdUserModified);
        }

        $this->collCiModulossRelatedByIdUserModified = $ciModulossRelatedByIdUserModified;
        $this->collCiModulossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiModulos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiModulos objects.
     * @throws PropelException
     */
    public function countCiModulossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiModulossRelatedByIdUserModified());
            }

            $query = ChildCiModulosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collCiModulossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildCiModulos object to this object
     * through the ChildCiModulos foreign key attribute.
     *
     * @param  ChildCiModulos $l ChildCiModulos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiModulosRelatedByIdUserModified(ChildCiModulos $l)
    {
        if ($this->collCiModulossRelatedByIdUserModified === null) {
            $this->initCiModulossRelatedByIdUserModified();
            $this->collCiModulossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collCiModulossRelatedByIdUserModified->contains($l)) {
            $this->doAddCiModulosRelatedByIdUserModified($l);

            if ($this->ciModulossRelatedByIdUserModifiedScheduledForDeletion and $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion->remove($this->ciModulossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiModulos $ciModulosRelatedByIdUserModified The ChildCiModulos object to add.
     */
    protected function doAddCiModulosRelatedByIdUserModified(ChildCiModulos $ciModulosRelatedByIdUserModified)
    {
        $this->collCiModulossRelatedByIdUserModified[]= $ciModulosRelatedByIdUserModified;
        $ciModulosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildCiModulos $ciModulosRelatedByIdUserModified The ChildCiModulos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiModulosRelatedByIdUserModified(ChildCiModulos $ciModulosRelatedByIdUserModified)
    {
        if ($this->getCiModulossRelatedByIdUserModified()->contains($ciModulosRelatedByIdUserModified)) {
            $pos = $this->collCiModulossRelatedByIdUserModified->search($ciModulosRelatedByIdUserModified);
            $this->collCiModulossRelatedByIdUserModified->remove($pos);
            if (null === $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collCiModulossRelatedByIdUserModified;
                $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->ciModulossRelatedByIdUserModifiedScheduledForDeletion[]= clone $ciModulosRelatedByIdUserModified;
            $ciModulosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiModulossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdUserModifiedJoinCiOptionsRelatedByIdOpcionModulo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOpcionModulo', $joinBehavior);

        return $this->getCiModulossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiModulossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdUserModifiedJoinCiOptionsRelatedByIdOpcionRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOpcionRoles', $joinBehavior);

        return $this->getCiModulossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collCiOptionssRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiOptionssRelatedByIdUserCreated()
     */
    public function clearCiOptionssRelatedByIdUserCreated()
    {
        $this->collCiOptionssRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiOptionssRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialCiOptionssRelatedByIdUserCreated($v = true)
    {
        $this->collCiOptionssRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collCiOptionssRelatedByIdUserCreated collection.
     *
     * By default this just sets the collCiOptionssRelatedByIdUserCreated collection to an empty array (like clearcollCiOptionssRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiOptionssRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collCiOptionssRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiOptionsTableMap::getTableMap()->getCollectionClassName();

        $this->collCiOptionssRelatedByIdUserCreated = new $collectionClassName;
        $this->collCiOptionssRelatedByIdUserCreated->setModel('\CiOptions');
    }

    /**
     * Gets an array of ChildCiOptions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiOptions[] List of ChildCiOptions objects
     * @throws PropelException
     */
    public function getCiOptionssRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiOptionssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collCiOptionssRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiOptionssRelatedByIdUserCreated) {
                // return empty collection
                $this->initCiOptionssRelatedByIdUserCreated();
            } else {
                $collCiOptionssRelatedByIdUserCreated = ChildCiOptionsQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiOptionssRelatedByIdUserCreatedPartial && count($collCiOptionssRelatedByIdUserCreated)) {
                        $this->initCiOptionssRelatedByIdUserCreated(false);

                        foreach ($collCiOptionssRelatedByIdUserCreated as $obj) {
                            if (false == $this->collCiOptionssRelatedByIdUserCreated->contains($obj)) {
                                $this->collCiOptionssRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collCiOptionssRelatedByIdUserCreatedPartial = true;
                    }

                    return $collCiOptionssRelatedByIdUserCreated;
                }

                if ($partial && $this->collCiOptionssRelatedByIdUserCreated) {
                    foreach ($this->collCiOptionssRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collCiOptionssRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collCiOptionssRelatedByIdUserCreated = $collCiOptionssRelatedByIdUserCreated;
                $this->collCiOptionssRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collCiOptionssRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildCiOptions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciOptionssRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiOptionssRelatedByIdUserCreated(Collection $ciOptionssRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildCiOptions[] $ciOptionssRelatedByIdUserCreatedToDelete */
        $ciOptionssRelatedByIdUserCreatedToDelete = $this->getCiOptionssRelatedByIdUserCreated(new Criteria(), $con)->diff($ciOptionssRelatedByIdUserCreated);


        $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion = $ciOptionssRelatedByIdUserCreatedToDelete;

        foreach ($ciOptionssRelatedByIdUserCreatedToDelete as $ciOptionsRelatedByIdUserCreatedRemoved) {
            $ciOptionsRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collCiOptionssRelatedByIdUserCreated = null;
        foreach ($ciOptionssRelatedByIdUserCreated as $ciOptionsRelatedByIdUserCreated) {
            $this->addCiOptionsRelatedByIdUserCreated($ciOptionsRelatedByIdUserCreated);
        }

        $this->collCiOptionssRelatedByIdUserCreated = $ciOptionssRelatedByIdUserCreated;
        $this->collCiOptionssRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiOptions objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiOptions objects.
     * @throws PropelException
     */
    public function countCiOptionssRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiOptionssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collCiOptionssRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiOptionssRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiOptionssRelatedByIdUserCreated());
            }

            $query = ChildCiOptionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collCiOptionssRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildCiOptions object to this object
     * through the ChildCiOptions foreign key attribute.
     *
     * @param  ChildCiOptions $l ChildCiOptions
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiOptionsRelatedByIdUserCreated(ChildCiOptions $l)
    {
        if ($this->collCiOptionssRelatedByIdUserCreated === null) {
            $this->initCiOptionssRelatedByIdUserCreated();
            $this->collCiOptionssRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collCiOptionssRelatedByIdUserCreated->contains($l)) {
            $this->doAddCiOptionsRelatedByIdUserCreated($l);

            if ($this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion and $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion->remove($this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiOptions $ciOptionsRelatedByIdUserCreated The ChildCiOptions object to add.
     */
    protected function doAddCiOptionsRelatedByIdUserCreated(ChildCiOptions $ciOptionsRelatedByIdUserCreated)
    {
        $this->collCiOptionssRelatedByIdUserCreated[]= $ciOptionsRelatedByIdUserCreated;
        $ciOptionsRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildCiOptions $ciOptionsRelatedByIdUserCreated The ChildCiOptions object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiOptionsRelatedByIdUserCreated(ChildCiOptions $ciOptionsRelatedByIdUserCreated)
    {
        if ($this->getCiOptionssRelatedByIdUserCreated()->contains($ciOptionsRelatedByIdUserCreated)) {
            $pos = $this->collCiOptionssRelatedByIdUserCreated->search($ciOptionsRelatedByIdUserCreated);
            $this->collCiOptionssRelatedByIdUserCreated->remove($pos);
            if (null === $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion) {
                $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion = clone $this->collCiOptionssRelatedByIdUserCreated;
                $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->ciOptionssRelatedByIdUserCreatedScheduledForDeletion[]= clone $ciOptionsRelatedByIdUserCreated;
            $ciOptionsRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiOptionssRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiOptions[] List of ChildCiOptions objects
     */
    public function getCiOptionssRelatedByIdUserCreatedJoinCiSettings(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiOptionsQuery::create(null, $criteria);
        $query->joinWith('CiSettings', $joinBehavior);

        return $this->getCiOptionssRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collCiOptionssRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiOptionssRelatedByIdUserModified()
     */
    public function clearCiOptionssRelatedByIdUserModified()
    {
        $this->collCiOptionssRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiOptionssRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialCiOptionssRelatedByIdUserModified($v = true)
    {
        $this->collCiOptionssRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collCiOptionssRelatedByIdUserModified collection.
     *
     * By default this just sets the collCiOptionssRelatedByIdUserModified collection to an empty array (like clearcollCiOptionssRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiOptionssRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collCiOptionssRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiOptionsTableMap::getTableMap()->getCollectionClassName();

        $this->collCiOptionssRelatedByIdUserModified = new $collectionClassName;
        $this->collCiOptionssRelatedByIdUserModified->setModel('\CiOptions');
    }

    /**
     * Gets an array of ChildCiOptions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiOptions[] List of ChildCiOptions objects
     * @throws PropelException
     */
    public function getCiOptionssRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiOptionssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collCiOptionssRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiOptionssRelatedByIdUserModified) {
                // return empty collection
                $this->initCiOptionssRelatedByIdUserModified();
            } else {
                $collCiOptionssRelatedByIdUserModified = ChildCiOptionsQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiOptionssRelatedByIdUserModifiedPartial && count($collCiOptionssRelatedByIdUserModified)) {
                        $this->initCiOptionssRelatedByIdUserModified(false);

                        foreach ($collCiOptionssRelatedByIdUserModified as $obj) {
                            if (false == $this->collCiOptionssRelatedByIdUserModified->contains($obj)) {
                                $this->collCiOptionssRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collCiOptionssRelatedByIdUserModifiedPartial = true;
                    }

                    return $collCiOptionssRelatedByIdUserModified;
                }

                if ($partial && $this->collCiOptionssRelatedByIdUserModified) {
                    foreach ($this->collCiOptionssRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collCiOptionssRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collCiOptionssRelatedByIdUserModified = $collCiOptionssRelatedByIdUserModified;
                $this->collCiOptionssRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collCiOptionssRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildCiOptions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciOptionssRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiOptionssRelatedByIdUserModified(Collection $ciOptionssRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildCiOptions[] $ciOptionssRelatedByIdUserModifiedToDelete */
        $ciOptionssRelatedByIdUserModifiedToDelete = $this->getCiOptionssRelatedByIdUserModified(new Criteria(), $con)->diff($ciOptionssRelatedByIdUserModified);


        $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion = $ciOptionssRelatedByIdUserModifiedToDelete;

        foreach ($ciOptionssRelatedByIdUserModifiedToDelete as $ciOptionsRelatedByIdUserModifiedRemoved) {
            $ciOptionsRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collCiOptionssRelatedByIdUserModified = null;
        foreach ($ciOptionssRelatedByIdUserModified as $ciOptionsRelatedByIdUserModified) {
            $this->addCiOptionsRelatedByIdUserModified($ciOptionsRelatedByIdUserModified);
        }

        $this->collCiOptionssRelatedByIdUserModified = $ciOptionssRelatedByIdUserModified;
        $this->collCiOptionssRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiOptions objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiOptions objects.
     * @throws PropelException
     */
    public function countCiOptionssRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiOptionssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collCiOptionssRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiOptionssRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiOptionssRelatedByIdUserModified());
            }

            $query = ChildCiOptionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collCiOptionssRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildCiOptions object to this object
     * through the ChildCiOptions foreign key attribute.
     *
     * @param  ChildCiOptions $l ChildCiOptions
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiOptionsRelatedByIdUserModified(ChildCiOptions $l)
    {
        if ($this->collCiOptionssRelatedByIdUserModified === null) {
            $this->initCiOptionssRelatedByIdUserModified();
            $this->collCiOptionssRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collCiOptionssRelatedByIdUserModified->contains($l)) {
            $this->doAddCiOptionsRelatedByIdUserModified($l);

            if ($this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion and $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion->remove($this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiOptions $ciOptionsRelatedByIdUserModified The ChildCiOptions object to add.
     */
    protected function doAddCiOptionsRelatedByIdUserModified(ChildCiOptions $ciOptionsRelatedByIdUserModified)
    {
        $this->collCiOptionssRelatedByIdUserModified[]= $ciOptionsRelatedByIdUserModified;
        $ciOptionsRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildCiOptions $ciOptionsRelatedByIdUserModified The ChildCiOptions object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiOptionsRelatedByIdUserModified(ChildCiOptions $ciOptionsRelatedByIdUserModified)
    {
        if ($this->getCiOptionssRelatedByIdUserModified()->contains($ciOptionsRelatedByIdUserModified)) {
            $pos = $this->collCiOptionssRelatedByIdUserModified->search($ciOptionsRelatedByIdUserModified);
            $this->collCiOptionssRelatedByIdUserModified->remove($pos);
            if (null === $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion) {
                $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion = clone $this->collCiOptionssRelatedByIdUserModified;
                $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->ciOptionssRelatedByIdUserModifiedScheduledForDeletion[]= clone $ciOptionsRelatedByIdUserModified;
            $ciOptionsRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiOptionssRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiOptions[] List of ChildCiOptions objects
     */
    public function getCiOptionssRelatedByIdUserModifiedJoinCiSettings(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiOptionsQuery::create(null, $criteria);
        $query->joinWith('CiSettings', $joinBehavior);

        return $this->getCiOptionssRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collCiSessionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiSessionss()
     */
    public function clearCiSessionss()
    {
        $this->collCiSessionss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiSessionss collection loaded partially.
     */
    public function resetPartialCiSessionss($v = true)
    {
        $this->collCiSessionssPartial = $v;
    }

    /**
     * Initializes the collCiSessionss collection.
     *
     * By default this just sets the collCiSessionss collection to an empty array (like clearcollCiSessionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiSessionss($overrideExisting = true)
    {
        if (null !== $this->collCiSessionss && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiSessionsTableMap::getTableMap()->getCollectionClassName();

        $this->collCiSessionss = new $collectionClassName;
        $this->collCiSessionss->setModel('\CiSessions');
    }

    /**
     * Gets an array of ChildCiSessions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiSessions[] List of ChildCiSessions objects
     * @throws PropelException
     */
    public function getCiSessionss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiSessionssPartial && !$this->isNew();
        if (null === $this->collCiSessionss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiSessionss) {
                // return empty collection
                $this->initCiSessionss();
            } else {
                $collCiSessionss = ChildCiSessionsQuery::create(null, $criteria)
                    ->filterByCiUsuarios($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiSessionssPartial && count($collCiSessionss)) {
                        $this->initCiSessionss(false);

                        foreach ($collCiSessionss as $obj) {
                            if (false == $this->collCiSessionss->contains($obj)) {
                                $this->collCiSessionss->append($obj);
                            }
                        }

                        $this->collCiSessionssPartial = true;
                    }

                    return $collCiSessionss;
                }

                if ($partial && $this->collCiSessionss) {
                    foreach ($this->collCiSessionss as $obj) {
                        if ($obj->isNew()) {
                            $collCiSessionss[] = $obj;
                        }
                    }
                }

                $this->collCiSessionss = $collCiSessionss;
                $this->collCiSessionssPartial = false;
            }
        }

        return $this->collCiSessionss;
    }

    /**
     * Sets a collection of ChildCiSessions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciSessionss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiSessionss(Collection $ciSessionss, ConnectionInterface $con = null)
    {
        /** @var ChildCiSessions[] $ciSessionssToDelete */
        $ciSessionssToDelete = $this->getCiSessionss(new Criteria(), $con)->diff($ciSessionss);


        $this->ciSessionssScheduledForDeletion = $ciSessionssToDelete;

        foreach ($ciSessionssToDelete as $ciSessionsRemoved) {
            $ciSessionsRemoved->setCiUsuarios(null);
        }

        $this->collCiSessionss = null;
        foreach ($ciSessionss as $ciSessions) {
            $this->addCiSessions($ciSessions);
        }

        $this->collCiSessionss = $ciSessionss;
        $this->collCiSessionssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiSessions objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiSessions objects.
     * @throws PropelException
     */
    public function countCiSessionss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiSessionssPartial && !$this->isNew();
        if (null === $this->collCiSessionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiSessionss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiSessionss());
            }

            $query = ChildCiSessionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuarios($this)
                ->count($con);
        }

        return count($this->collCiSessionss);
    }

    /**
     * Method called to associate a ChildCiSessions object to this object
     * through the ChildCiSessions foreign key attribute.
     *
     * @param  ChildCiSessions $l ChildCiSessions
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiSessions(ChildCiSessions $l)
    {
        if ($this->collCiSessionss === null) {
            $this->initCiSessionss();
            $this->collCiSessionssPartial = true;
        }

        if (!$this->collCiSessionss->contains($l)) {
            $this->doAddCiSessions($l);

            if ($this->ciSessionssScheduledForDeletion and $this->ciSessionssScheduledForDeletion->contains($l)) {
                $this->ciSessionssScheduledForDeletion->remove($this->ciSessionssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiSessions $ciSessions The ChildCiSessions object to add.
     */
    protected function doAddCiSessions(ChildCiSessions $ciSessions)
    {
        $this->collCiSessionss[]= $ciSessions;
        $ciSessions->setCiUsuarios($this);
    }

    /**
     * @param  ChildCiSessions $ciSessions The ChildCiSessions object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiSessions(ChildCiSessions $ciSessions)
    {
        if ($this->getCiSessionss()->contains($ciSessions)) {
            $pos = $this->collCiSessionss->search($ciSessions);
            $this->collCiSessionss->remove($pos);
            if (null === $this->ciSessionssScheduledForDeletion) {
                $this->ciSessionssScheduledForDeletion = clone $this->collCiSessionss;
                $this->ciSessionssScheduledForDeletion->clear();
            }
            $this->ciSessionssScheduledForDeletion[]= $ciSessions;
            $ciSessions->setCiUsuarios(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiSessionss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiSessions[] List of ChildCiSessions objects
     */
    public function getCiSessionssJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiSessionsQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getCiSessionss($query, $con);
    }

    /**
     * Clears out the collCiSettingssRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiSettingssRelatedByIdUserCreated()
     */
    public function clearCiSettingssRelatedByIdUserCreated()
    {
        $this->collCiSettingssRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiSettingssRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialCiSettingssRelatedByIdUserCreated($v = true)
    {
        $this->collCiSettingssRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collCiSettingssRelatedByIdUserCreated collection.
     *
     * By default this just sets the collCiSettingssRelatedByIdUserCreated collection to an empty array (like clearcollCiSettingssRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiSettingssRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collCiSettingssRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiSettingsTableMap::getTableMap()->getCollectionClassName();

        $this->collCiSettingssRelatedByIdUserCreated = new $collectionClassName;
        $this->collCiSettingssRelatedByIdUserCreated->setModel('\CiSettings');
    }

    /**
     * Gets an array of ChildCiSettings objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiSettings[] List of ChildCiSettings objects
     * @throws PropelException
     */
    public function getCiSettingssRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiSettingssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collCiSettingssRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiSettingssRelatedByIdUserCreated) {
                // return empty collection
                $this->initCiSettingssRelatedByIdUserCreated();
            } else {
                $collCiSettingssRelatedByIdUserCreated = ChildCiSettingsQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiSettingssRelatedByIdUserCreatedPartial && count($collCiSettingssRelatedByIdUserCreated)) {
                        $this->initCiSettingssRelatedByIdUserCreated(false);

                        foreach ($collCiSettingssRelatedByIdUserCreated as $obj) {
                            if (false == $this->collCiSettingssRelatedByIdUserCreated->contains($obj)) {
                                $this->collCiSettingssRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collCiSettingssRelatedByIdUserCreatedPartial = true;
                    }

                    return $collCiSettingssRelatedByIdUserCreated;
                }

                if ($partial && $this->collCiSettingssRelatedByIdUserCreated) {
                    foreach ($this->collCiSettingssRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collCiSettingssRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collCiSettingssRelatedByIdUserCreated = $collCiSettingssRelatedByIdUserCreated;
                $this->collCiSettingssRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collCiSettingssRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildCiSettings objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciSettingssRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiSettingssRelatedByIdUserCreated(Collection $ciSettingssRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildCiSettings[] $ciSettingssRelatedByIdUserCreatedToDelete */
        $ciSettingssRelatedByIdUserCreatedToDelete = $this->getCiSettingssRelatedByIdUserCreated(new Criteria(), $con)->diff($ciSettingssRelatedByIdUserCreated);


        $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion = $ciSettingssRelatedByIdUserCreatedToDelete;

        foreach ($ciSettingssRelatedByIdUserCreatedToDelete as $ciSettingsRelatedByIdUserCreatedRemoved) {
            $ciSettingsRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collCiSettingssRelatedByIdUserCreated = null;
        foreach ($ciSettingssRelatedByIdUserCreated as $ciSettingsRelatedByIdUserCreated) {
            $this->addCiSettingsRelatedByIdUserCreated($ciSettingsRelatedByIdUserCreated);
        }

        $this->collCiSettingssRelatedByIdUserCreated = $ciSettingssRelatedByIdUserCreated;
        $this->collCiSettingssRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiSettings objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiSettings objects.
     * @throws PropelException
     */
    public function countCiSettingssRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiSettingssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collCiSettingssRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiSettingssRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiSettingssRelatedByIdUserCreated());
            }

            $query = ChildCiSettingsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collCiSettingssRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildCiSettings object to this object
     * through the ChildCiSettings foreign key attribute.
     *
     * @param  ChildCiSettings $l ChildCiSettings
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiSettingsRelatedByIdUserCreated(ChildCiSettings $l)
    {
        if ($this->collCiSettingssRelatedByIdUserCreated === null) {
            $this->initCiSettingssRelatedByIdUserCreated();
            $this->collCiSettingssRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collCiSettingssRelatedByIdUserCreated->contains($l)) {
            $this->doAddCiSettingsRelatedByIdUserCreated($l);

            if ($this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion and $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion->remove($this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiSettings $ciSettingsRelatedByIdUserCreated The ChildCiSettings object to add.
     */
    protected function doAddCiSettingsRelatedByIdUserCreated(ChildCiSettings $ciSettingsRelatedByIdUserCreated)
    {
        $this->collCiSettingssRelatedByIdUserCreated[]= $ciSettingsRelatedByIdUserCreated;
        $ciSettingsRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildCiSettings $ciSettingsRelatedByIdUserCreated The ChildCiSettings object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiSettingsRelatedByIdUserCreated(ChildCiSettings $ciSettingsRelatedByIdUserCreated)
    {
        if ($this->getCiSettingssRelatedByIdUserCreated()->contains($ciSettingsRelatedByIdUserCreated)) {
            $pos = $this->collCiSettingssRelatedByIdUserCreated->search($ciSettingsRelatedByIdUserCreated);
            $this->collCiSettingssRelatedByIdUserCreated->remove($pos);
            if (null === $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion) {
                $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion = clone $this->collCiSettingssRelatedByIdUserCreated;
                $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->ciSettingssRelatedByIdUserCreatedScheduledForDeletion[]= clone $ciSettingsRelatedByIdUserCreated;
            $ciSettingsRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }

    /**
     * Clears out the collCiSettingssRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiSettingssRelatedByIdUserModified()
     */
    public function clearCiSettingssRelatedByIdUserModified()
    {
        $this->collCiSettingssRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiSettingssRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialCiSettingssRelatedByIdUserModified($v = true)
    {
        $this->collCiSettingssRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collCiSettingssRelatedByIdUserModified collection.
     *
     * By default this just sets the collCiSettingssRelatedByIdUserModified collection to an empty array (like clearcollCiSettingssRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiSettingssRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collCiSettingssRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiSettingsTableMap::getTableMap()->getCollectionClassName();

        $this->collCiSettingssRelatedByIdUserModified = new $collectionClassName;
        $this->collCiSettingssRelatedByIdUserModified->setModel('\CiSettings');
    }

    /**
     * Gets an array of ChildCiSettings objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiSettings[] List of ChildCiSettings objects
     * @throws PropelException
     */
    public function getCiSettingssRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiSettingssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collCiSettingssRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiSettingssRelatedByIdUserModified) {
                // return empty collection
                $this->initCiSettingssRelatedByIdUserModified();
            } else {
                $collCiSettingssRelatedByIdUserModified = ChildCiSettingsQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiSettingssRelatedByIdUserModifiedPartial && count($collCiSettingssRelatedByIdUserModified)) {
                        $this->initCiSettingssRelatedByIdUserModified(false);

                        foreach ($collCiSettingssRelatedByIdUserModified as $obj) {
                            if (false == $this->collCiSettingssRelatedByIdUserModified->contains($obj)) {
                                $this->collCiSettingssRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collCiSettingssRelatedByIdUserModifiedPartial = true;
                    }

                    return $collCiSettingssRelatedByIdUserModified;
                }

                if ($partial && $this->collCiSettingssRelatedByIdUserModified) {
                    foreach ($this->collCiSettingssRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collCiSettingssRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collCiSettingssRelatedByIdUserModified = $collCiSettingssRelatedByIdUserModified;
                $this->collCiSettingssRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collCiSettingssRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildCiSettings objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciSettingssRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiSettingssRelatedByIdUserModified(Collection $ciSettingssRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildCiSettings[] $ciSettingssRelatedByIdUserModifiedToDelete */
        $ciSettingssRelatedByIdUserModifiedToDelete = $this->getCiSettingssRelatedByIdUserModified(new Criteria(), $con)->diff($ciSettingssRelatedByIdUserModified);


        $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion = $ciSettingssRelatedByIdUserModifiedToDelete;

        foreach ($ciSettingssRelatedByIdUserModifiedToDelete as $ciSettingsRelatedByIdUserModifiedRemoved) {
            $ciSettingsRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collCiSettingssRelatedByIdUserModified = null;
        foreach ($ciSettingssRelatedByIdUserModified as $ciSettingsRelatedByIdUserModified) {
            $this->addCiSettingsRelatedByIdUserModified($ciSettingsRelatedByIdUserModified);
        }

        $this->collCiSettingssRelatedByIdUserModified = $ciSettingssRelatedByIdUserModified;
        $this->collCiSettingssRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiSettings objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiSettings objects.
     * @throws PropelException
     */
    public function countCiSettingssRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiSettingssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collCiSettingssRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiSettingssRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiSettingssRelatedByIdUserModified());
            }

            $query = ChildCiSettingsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collCiSettingssRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildCiSettings object to this object
     * through the ChildCiSettings foreign key attribute.
     *
     * @param  ChildCiSettings $l ChildCiSettings
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiSettingsRelatedByIdUserModified(ChildCiSettings $l)
    {
        if ($this->collCiSettingssRelatedByIdUserModified === null) {
            $this->initCiSettingssRelatedByIdUserModified();
            $this->collCiSettingssRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collCiSettingssRelatedByIdUserModified->contains($l)) {
            $this->doAddCiSettingsRelatedByIdUserModified($l);

            if ($this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion and $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion->remove($this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiSettings $ciSettingsRelatedByIdUserModified The ChildCiSettings object to add.
     */
    protected function doAddCiSettingsRelatedByIdUserModified(ChildCiSettings $ciSettingsRelatedByIdUserModified)
    {
        $this->collCiSettingssRelatedByIdUserModified[]= $ciSettingsRelatedByIdUserModified;
        $ciSettingsRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildCiSettings $ciSettingsRelatedByIdUserModified The ChildCiSettings object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiSettingsRelatedByIdUserModified(ChildCiSettings $ciSettingsRelatedByIdUserModified)
    {
        if ($this->getCiSettingssRelatedByIdUserModified()->contains($ciSettingsRelatedByIdUserModified)) {
            $pos = $this->collCiSettingssRelatedByIdUserModified->search($ciSettingsRelatedByIdUserModified);
            $this->collCiSettingssRelatedByIdUserModified->remove($pos);
            if (null === $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion) {
                $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion = clone $this->collCiSettingssRelatedByIdUserModified;
                $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->ciSettingssRelatedByIdUserModifiedScheduledForDeletion[]= clone $ciSettingsRelatedByIdUserModified;
            $ciSettingsRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdUsuario collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdUsuario()
     */
    public function clearCiUsuariossRelatedByIdUsuario()
    {
        $this->collCiUsuariossRelatedByIdUsuario = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdUsuario collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdUsuario($v = true)
    {
        $this->collCiUsuariossRelatedByIdUsuarioPartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdUsuario collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdUsuario collection to an empty array (like clearcollCiUsuariossRelatedByIdUsuario());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdUsuario($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdUsuario && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdUsuario = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdUsuario->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdUsuario(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdUsuarioPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdUsuario || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdUsuario) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdUsuario();
            } else {
                $collCiUsuariossRelatedByIdUsuario = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByInvitadoPor($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdUsuarioPartial && count($collCiUsuariossRelatedByIdUsuario)) {
                        $this->initCiUsuariossRelatedByIdUsuario(false);

                        foreach ($collCiUsuariossRelatedByIdUsuario as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdUsuario->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdUsuario->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdUsuarioPartial = true;
                    }

                    return $collCiUsuariossRelatedByIdUsuario;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdUsuario) {
                    foreach ($this->collCiUsuariossRelatedByIdUsuario as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdUsuario[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdUsuario = $collCiUsuariossRelatedByIdUsuario;
                $this->collCiUsuariossRelatedByIdUsuarioPartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdUsuario;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdUsuario A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdUsuario(Collection $ciUsuariossRelatedByIdUsuario, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdUsuarioToDelete */
        $ciUsuariossRelatedByIdUsuarioToDelete = $this->getCiUsuariossRelatedByIdUsuario(new Criteria(), $con)->diff($ciUsuariossRelatedByIdUsuario);


        $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion = $ciUsuariossRelatedByIdUsuarioToDelete;

        foreach ($ciUsuariossRelatedByIdUsuarioToDelete as $ciUsuariosRelatedByIdUsuarioRemoved) {
            $ciUsuariosRelatedByIdUsuarioRemoved->setCiUsuariosRelatedByInvitadoPor(null);
        }

        $this->collCiUsuariossRelatedByIdUsuario = null;
        foreach ($ciUsuariossRelatedByIdUsuario as $ciUsuariosRelatedByIdUsuario) {
            $this->addCiUsuariosRelatedByIdUsuario($ciUsuariosRelatedByIdUsuario);
        }

        $this->collCiUsuariossRelatedByIdUsuario = $ciUsuariossRelatedByIdUsuario;
        $this->collCiUsuariossRelatedByIdUsuarioPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CiUsuarios objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CiUsuarios objects.
     * @throws PropelException
     */
    public function countCiUsuariossRelatedByIdUsuario(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdUsuarioPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdUsuario || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdUsuario) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdUsuario());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByInvitadoPor($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdUsuario);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdUsuario(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdUsuario === null) {
            $this->initCiUsuariossRelatedByIdUsuario();
            $this->collCiUsuariossRelatedByIdUsuarioPartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdUsuario->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdUsuario($l);

            if ($this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion and $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion->remove($this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdUsuario The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdUsuario(ChildCiUsuarios $ciUsuariosRelatedByIdUsuario)
    {
        $this->collCiUsuariossRelatedByIdUsuario[]= $ciUsuariosRelatedByIdUsuario;
        $ciUsuariosRelatedByIdUsuario->setCiUsuariosRelatedByInvitadoPor($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdUsuario The ChildCiUsuarios object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdUsuario(ChildCiUsuarios $ciUsuariosRelatedByIdUsuario)
    {
        if ($this->getCiUsuariossRelatedByIdUsuario()->contains($ciUsuariosRelatedByIdUsuario)) {
            $pos = $this->collCiUsuariossRelatedByIdUsuario->search($ciUsuariosRelatedByIdUsuario);
            $this->collCiUsuariossRelatedByIdUsuario->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdUsuario;
                $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdUsuarioScheduledForDeletion[]= $ciUsuariosRelatedByIdUsuario;
            $ciUsuariosRelatedByIdUsuario->setCiUsuariosRelatedByInvitadoPor(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdUsuarioJoinCiOptionsRelatedByIdOptionTipoAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionTipoAsociado', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdUsuarioJoinCiOptionsRelatedByIdOptionNivelAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionNivelAsociado', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdUsuarioJoinCiOptionsRelatedByIdOpcionRole(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOpcionRole', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdUsuarioJoinHbfTurnosRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnosRelatedByIdTurno', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdUsuarioJoinHbfSesionesRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfSesionesRelatedByIdSesion', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdUsuarioJoinCiOptionsRelatedByIdTipoUsuario(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdTipoUsuario', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdUsuarioJoinHbfClubsRelatedByIdClub(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfClubsRelatedByIdClub', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdUsuario($query, $con);
    }

    /**
     * Clears out the collHbfClubssRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfClubssRelatedByIdUserCreated()
     */
    public function clearHbfClubssRelatedByIdUserCreated()
    {
        $this->collHbfClubssRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfClubssRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfClubssRelatedByIdUserCreated($v = true)
    {
        $this->collHbfClubssRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfClubssRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfClubssRelatedByIdUserCreated collection to an empty array (like clearcollHbfClubssRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfClubssRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfClubssRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfClubsTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfClubssRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfClubssRelatedByIdUserCreated->setModel('\HbfClubs');
    }

    /**
     * Gets an array of ChildHbfClubs objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfClubs[] List of ChildHbfClubs objects
     * @throws PropelException
     */
    public function getHbfClubssRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfClubssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfClubssRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfClubssRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfClubssRelatedByIdUserCreated();
            } else {
                $collHbfClubssRelatedByIdUserCreated = ChildHbfClubsQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfClubssRelatedByIdUserCreatedPartial && count($collHbfClubssRelatedByIdUserCreated)) {
                        $this->initHbfClubssRelatedByIdUserCreated(false);

                        foreach ($collHbfClubssRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfClubssRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfClubssRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfClubssRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfClubssRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfClubssRelatedByIdUserCreated) {
                    foreach ($this->collHbfClubssRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfClubssRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfClubssRelatedByIdUserCreated = $collHbfClubssRelatedByIdUserCreated;
                $this->collHbfClubssRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfClubssRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfClubs objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfClubssRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfClubssRelatedByIdUserCreated(Collection $hbfClubssRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfClubs[] $hbfClubssRelatedByIdUserCreatedToDelete */
        $hbfClubssRelatedByIdUserCreatedToDelete = $this->getHbfClubssRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfClubssRelatedByIdUserCreated);


        $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion = $hbfClubssRelatedByIdUserCreatedToDelete;

        foreach ($hbfClubssRelatedByIdUserCreatedToDelete as $hbfClubsRelatedByIdUserCreatedRemoved) {
            $hbfClubsRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfClubssRelatedByIdUserCreated = null;
        foreach ($hbfClubssRelatedByIdUserCreated as $hbfClubsRelatedByIdUserCreated) {
            $this->addHbfClubsRelatedByIdUserCreated($hbfClubsRelatedByIdUserCreated);
        }

        $this->collHbfClubssRelatedByIdUserCreated = $hbfClubssRelatedByIdUserCreated;
        $this->collHbfClubssRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfClubs objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfClubs objects.
     * @throws PropelException
     */
    public function countHbfClubssRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfClubssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfClubssRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfClubssRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfClubssRelatedByIdUserCreated());
            }

            $query = ChildHbfClubsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfClubssRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfClubs object to this object
     * through the ChildHbfClubs foreign key attribute.
     *
     * @param  ChildHbfClubs $l ChildHbfClubs
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfClubsRelatedByIdUserCreated(ChildHbfClubs $l)
    {
        if ($this->collHbfClubssRelatedByIdUserCreated === null) {
            $this->initHbfClubssRelatedByIdUserCreated();
            $this->collHbfClubssRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfClubssRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfClubsRelatedByIdUserCreated($l);

            if ($this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion and $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfClubs $hbfClubsRelatedByIdUserCreated The ChildHbfClubs object to add.
     */
    protected function doAddHbfClubsRelatedByIdUserCreated(ChildHbfClubs $hbfClubsRelatedByIdUserCreated)
    {
        $this->collHbfClubssRelatedByIdUserCreated[]= $hbfClubsRelatedByIdUserCreated;
        $hbfClubsRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfClubs $hbfClubsRelatedByIdUserCreated The ChildHbfClubs object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfClubsRelatedByIdUserCreated(ChildHbfClubs $hbfClubsRelatedByIdUserCreated)
    {
        if ($this->getHbfClubssRelatedByIdUserCreated()->contains($hbfClubsRelatedByIdUserCreated)) {
            $pos = $this->collHbfClubssRelatedByIdUserCreated->search($hbfClubsRelatedByIdUserCreated);
            $this->collHbfClubssRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfClubssRelatedByIdUserCreated;
                $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfClubssRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfClubsRelatedByIdUserCreated;
            $hbfClubsRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }

    /**
     * Clears out the collHbfClubssRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfClubssRelatedByIdUserModified()
     */
    public function clearHbfClubssRelatedByIdUserModified()
    {
        $this->collHbfClubssRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfClubssRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfClubssRelatedByIdUserModified($v = true)
    {
        $this->collHbfClubssRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfClubssRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfClubssRelatedByIdUserModified collection to an empty array (like clearcollHbfClubssRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfClubssRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfClubssRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfClubsTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfClubssRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfClubssRelatedByIdUserModified->setModel('\HbfClubs');
    }

    /**
     * Gets an array of ChildHbfClubs objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfClubs[] List of ChildHbfClubs objects
     * @throws PropelException
     */
    public function getHbfClubssRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfClubssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfClubssRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfClubssRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfClubssRelatedByIdUserModified();
            } else {
                $collHbfClubssRelatedByIdUserModified = ChildHbfClubsQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfClubssRelatedByIdUserModifiedPartial && count($collHbfClubssRelatedByIdUserModified)) {
                        $this->initHbfClubssRelatedByIdUserModified(false);

                        foreach ($collHbfClubssRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfClubssRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfClubssRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfClubssRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfClubssRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfClubssRelatedByIdUserModified) {
                    foreach ($this->collHbfClubssRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfClubssRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfClubssRelatedByIdUserModified = $collHbfClubssRelatedByIdUserModified;
                $this->collHbfClubssRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfClubssRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfClubs objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfClubssRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfClubssRelatedByIdUserModified(Collection $hbfClubssRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfClubs[] $hbfClubssRelatedByIdUserModifiedToDelete */
        $hbfClubssRelatedByIdUserModifiedToDelete = $this->getHbfClubssRelatedByIdUserModified(new Criteria(), $con)->diff($hbfClubssRelatedByIdUserModified);


        $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion = $hbfClubssRelatedByIdUserModifiedToDelete;

        foreach ($hbfClubssRelatedByIdUserModifiedToDelete as $hbfClubsRelatedByIdUserModifiedRemoved) {
            $hbfClubsRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfClubssRelatedByIdUserModified = null;
        foreach ($hbfClubssRelatedByIdUserModified as $hbfClubsRelatedByIdUserModified) {
            $this->addHbfClubsRelatedByIdUserModified($hbfClubsRelatedByIdUserModified);
        }

        $this->collHbfClubssRelatedByIdUserModified = $hbfClubssRelatedByIdUserModified;
        $this->collHbfClubssRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfClubs objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfClubs objects.
     * @throws PropelException
     */
    public function countHbfClubssRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfClubssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfClubssRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfClubssRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfClubssRelatedByIdUserModified());
            }

            $query = ChildHbfClubsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfClubssRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfClubs object to this object
     * through the ChildHbfClubs foreign key attribute.
     *
     * @param  ChildHbfClubs $l ChildHbfClubs
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfClubsRelatedByIdUserModified(ChildHbfClubs $l)
    {
        if ($this->collHbfClubssRelatedByIdUserModified === null) {
            $this->initHbfClubssRelatedByIdUserModified();
            $this->collHbfClubssRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfClubssRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfClubsRelatedByIdUserModified($l);

            if ($this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion and $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfClubs $hbfClubsRelatedByIdUserModified The ChildHbfClubs object to add.
     */
    protected function doAddHbfClubsRelatedByIdUserModified(ChildHbfClubs $hbfClubsRelatedByIdUserModified)
    {
        $this->collHbfClubssRelatedByIdUserModified[]= $hbfClubsRelatedByIdUserModified;
        $hbfClubsRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfClubs $hbfClubsRelatedByIdUserModified The ChildHbfClubs object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfClubsRelatedByIdUserModified(ChildHbfClubs $hbfClubsRelatedByIdUserModified)
    {
        if ($this->getHbfClubssRelatedByIdUserModified()->contains($hbfClubsRelatedByIdUserModified)) {
            $pos = $this->collHbfClubssRelatedByIdUserModified->search($hbfClubsRelatedByIdUserModified);
            $this->collHbfClubssRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfClubssRelatedByIdUserModified;
                $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfClubssRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfClubsRelatedByIdUserModified;
            $hbfClubsRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }

    /**
     * Clears out the collHbfComandassRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfComandassRelatedByIdUserCreated()
     */
    public function clearHbfComandassRelatedByIdUserCreated()
    {
        $this->collHbfComandassRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfComandassRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfComandassRelatedByIdUserCreated($v = true)
    {
        $this->collHbfComandassRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfComandassRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfComandassRelatedByIdUserCreated collection to an empty array (like clearcollHbfComandassRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfComandassRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfComandassRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfComandasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfComandassRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfComandassRelatedByIdUserCreated->setModel('\HbfComandas');
    }

    /**
     * Gets an array of ChildHbfComandas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     * @throws PropelException
     */
    public function getHbfComandassRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfComandassRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfComandassRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfComandassRelatedByIdUserCreated();
            } else {
                $collHbfComandassRelatedByIdUserCreated = ChildHbfComandasQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfComandassRelatedByIdUserCreatedPartial && count($collHbfComandassRelatedByIdUserCreated)) {
                        $this->initHbfComandassRelatedByIdUserCreated(false);

                        foreach ($collHbfComandassRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfComandassRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfComandassRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfComandassRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfComandassRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfComandassRelatedByIdUserCreated) {
                    foreach ($this->collHbfComandassRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfComandassRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfComandassRelatedByIdUserCreated = $collHbfComandassRelatedByIdUserCreated;
                $this->collHbfComandassRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfComandassRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfComandas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfComandassRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfComandassRelatedByIdUserCreated(Collection $hbfComandassRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfComandas[] $hbfComandassRelatedByIdUserCreatedToDelete */
        $hbfComandassRelatedByIdUserCreatedToDelete = $this->getHbfComandassRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfComandassRelatedByIdUserCreated);


        $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion = $hbfComandassRelatedByIdUserCreatedToDelete;

        foreach ($hbfComandassRelatedByIdUserCreatedToDelete as $hbfComandasRelatedByIdUserCreatedRemoved) {
            $hbfComandasRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfComandassRelatedByIdUserCreated = null;
        foreach ($hbfComandassRelatedByIdUserCreated as $hbfComandasRelatedByIdUserCreated) {
            $this->addHbfComandasRelatedByIdUserCreated($hbfComandasRelatedByIdUserCreated);
        }

        $this->collHbfComandassRelatedByIdUserCreated = $hbfComandassRelatedByIdUserCreated;
        $this->collHbfComandassRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfComandas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfComandas objects.
     * @throws PropelException
     */
    public function countHbfComandassRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfComandassRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfComandassRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfComandassRelatedByIdUserCreated());
            }

            $query = ChildHbfComandasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfComandassRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfComandas object to this object
     * through the ChildHbfComandas foreign key attribute.
     *
     * @param  ChildHbfComandas $l ChildHbfComandas
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfComandasRelatedByIdUserCreated(ChildHbfComandas $l)
    {
        if ($this->collHbfComandassRelatedByIdUserCreated === null) {
            $this->initHbfComandassRelatedByIdUserCreated();
            $this->collHbfComandassRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfComandassRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfComandasRelatedByIdUserCreated($l);

            if ($this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion and $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfComandas $hbfComandasRelatedByIdUserCreated The ChildHbfComandas object to add.
     */
    protected function doAddHbfComandasRelatedByIdUserCreated(ChildHbfComandas $hbfComandasRelatedByIdUserCreated)
    {
        $this->collHbfComandassRelatedByIdUserCreated[]= $hbfComandasRelatedByIdUserCreated;
        $hbfComandasRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfComandas $hbfComandasRelatedByIdUserCreated The ChildHbfComandas object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfComandasRelatedByIdUserCreated(ChildHbfComandas $hbfComandasRelatedByIdUserCreated)
    {
        if ($this->getHbfComandassRelatedByIdUserCreated()->contains($hbfComandasRelatedByIdUserCreated)) {
            $pos = $this->collHbfComandassRelatedByIdUserCreated->search($hbfComandasRelatedByIdUserCreated);
            $this->collHbfComandassRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfComandassRelatedByIdUserCreated;
                $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfComandassRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfComandasRelatedByIdUserCreated;
            $hbfComandasRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserCreatedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserCreatedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserCreatedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserCreatedJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfComandassRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfComandassRelatedByIdUserModified()
     */
    public function clearHbfComandassRelatedByIdUserModified()
    {
        $this->collHbfComandassRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfComandassRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfComandassRelatedByIdUserModified($v = true)
    {
        $this->collHbfComandassRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfComandassRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfComandassRelatedByIdUserModified collection to an empty array (like clearcollHbfComandassRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfComandassRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfComandassRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfComandasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfComandassRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfComandassRelatedByIdUserModified->setModel('\HbfComandas');
    }

    /**
     * Gets an array of ChildHbfComandas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     * @throws PropelException
     */
    public function getHbfComandassRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfComandassRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfComandassRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfComandassRelatedByIdUserModified();
            } else {
                $collHbfComandassRelatedByIdUserModified = ChildHbfComandasQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfComandassRelatedByIdUserModifiedPartial && count($collHbfComandassRelatedByIdUserModified)) {
                        $this->initHbfComandassRelatedByIdUserModified(false);

                        foreach ($collHbfComandassRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfComandassRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfComandassRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfComandassRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfComandassRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfComandassRelatedByIdUserModified) {
                    foreach ($this->collHbfComandassRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfComandassRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfComandassRelatedByIdUserModified = $collHbfComandassRelatedByIdUserModified;
                $this->collHbfComandassRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfComandassRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfComandas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfComandassRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfComandassRelatedByIdUserModified(Collection $hbfComandassRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfComandas[] $hbfComandassRelatedByIdUserModifiedToDelete */
        $hbfComandassRelatedByIdUserModifiedToDelete = $this->getHbfComandassRelatedByIdUserModified(new Criteria(), $con)->diff($hbfComandassRelatedByIdUserModified);


        $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion = $hbfComandassRelatedByIdUserModifiedToDelete;

        foreach ($hbfComandassRelatedByIdUserModifiedToDelete as $hbfComandasRelatedByIdUserModifiedRemoved) {
            $hbfComandasRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfComandassRelatedByIdUserModified = null;
        foreach ($hbfComandassRelatedByIdUserModified as $hbfComandasRelatedByIdUserModified) {
            $this->addHbfComandasRelatedByIdUserModified($hbfComandasRelatedByIdUserModified);
        }

        $this->collHbfComandassRelatedByIdUserModified = $hbfComandassRelatedByIdUserModified;
        $this->collHbfComandassRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfComandas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfComandas objects.
     * @throws PropelException
     */
    public function countHbfComandassRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfComandassRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfComandassRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfComandassRelatedByIdUserModified());
            }

            $query = ChildHbfComandasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfComandassRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfComandas object to this object
     * through the ChildHbfComandas foreign key attribute.
     *
     * @param  ChildHbfComandas $l ChildHbfComandas
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfComandasRelatedByIdUserModified(ChildHbfComandas $l)
    {
        if ($this->collHbfComandassRelatedByIdUserModified === null) {
            $this->initHbfComandassRelatedByIdUserModified();
            $this->collHbfComandassRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfComandassRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfComandasRelatedByIdUserModified($l);

            if ($this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion and $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfComandas $hbfComandasRelatedByIdUserModified The ChildHbfComandas object to add.
     */
    protected function doAddHbfComandasRelatedByIdUserModified(ChildHbfComandas $hbfComandasRelatedByIdUserModified)
    {
        $this->collHbfComandassRelatedByIdUserModified[]= $hbfComandasRelatedByIdUserModified;
        $hbfComandasRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfComandas $hbfComandasRelatedByIdUserModified The ChildHbfComandas object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfComandasRelatedByIdUserModified(ChildHbfComandas $hbfComandasRelatedByIdUserModified)
    {
        if ($this->getHbfComandassRelatedByIdUserModified()->contains($hbfComandasRelatedByIdUserModified)) {
            $pos = $this->collHbfComandassRelatedByIdUserModified->search($hbfComandasRelatedByIdUserModified);
            $this->collHbfComandassRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfComandassRelatedByIdUserModified;
                $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfComandassRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfComandasRelatedByIdUserModified;
            $hbfComandasRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserModifiedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserModifiedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserModifiedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdUserModifiedJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfComandassRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfComandassRelatedByIdCliente collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfComandassRelatedByIdCliente()
     */
    public function clearHbfComandassRelatedByIdCliente()
    {
        $this->collHbfComandassRelatedByIdCliente = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfComandassRelatedByIdCliente collection loaded partially.
     */
    public function resetPartialHbfComandassRelatedByIdCliente($v = true)
    {
        $this->collHbfComandassRelatedByIdClientePartial = $v;
    }

    /**
     * Initializes the collHbfComandassRelatedByIdCliente collection.
     *
     * By default this just sets the collHbfComandassRelatedByIdCliente collection to an empty array (like clearcollHbfComandassRelatedByIdCliente());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfComandassRelatedByIdCliente($overrideExisting = true)
    {
        if (null !== $this->collHbfComandassRelatedByIdCliente && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfComandasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfComandassRelatedByIdCliente = new $collectionClassName;
        $this->collHbfComandassRelatedByIdCliente->setModel('\HbfComandas');
    }

    /**
     * Gets an array of ChildHbfComandas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     * @throws PropelException
     */
    public function getHbfComandassRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfComandassRelatedByIdCliente || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfComandassRelatedByIdCliente) {
                // return empty collection
                $this->initHbfComandassRelatedByIdCliente();
            } else {
                $collHbfComandassRelatedByIdCliente = ChildHbfComandasQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfComandassRelatedByIdClientePartial && count($collHbfComandassRelatedByIdCliente)) {
                        $this->initHbfComandassRelatedByIdCliente(false);

                        foreach ($collHbfComandassRelatedByIdCliente as $obj) {
                            if (false == $this->collHbfComandassRelatedByIdCliente->contains($obj)) {
                                $this->collHbfComandassRelatedByIdCliente->append($obj);
                            }
                        }

                        $this->collHbfComandassRelatedByIdClientePartial = true;
                    }

                    return $collHbfComandassRelatedByIdCliente;
                }

                if ($partial && $this->collHbfComandassRelatedByIdCliente) {
                    foreach ($this->collHbfComandassRelatedByIdCliente as $obj) {
                        if ($obj->isNew()) {
                            $collHbfComandassRelatedByIdCliente[] = $obj;
                        }
                    }
                }

                $this->collHbfComandassRelatedByIdCliente = $collHbfComandassRelatedByIdCliente;
                $this->collHbfComandassRelatedByIdClientePartial = false;
            }
        }

        return $this->collHbfComandassRelatedByIdCliente;
    }

    /**
     * Sets a collection of ChildHbfComandas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfComandassRelatedByIdCliente A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfComandassRelatedByIdCliente(Collection $hbfComandassRelatedByIdCliente, ConnectionInterface $con = null)
    {
        /** @var ChildHbfComandas[] $hbfComandassRelatedByIdClienteToDelete */
        $hbfComandassRelatedByIdClienteToDelete = $this->getHbfComandassRelatedByIdCliente(new Criteria(), $con)->diff($hbfComandassRelatedByIdCliente);


        $this->hbfComandassRelatedByIdClienteScheduledForDeletion = $hbfComandassRelatedByIdClienteToDelete;

        foreach ($hbfComandassRelatedByIdClienteToDelete as $hbfComandasRelatedByIdClienteRemoved) {
            $hbfComandasRelatedByIdClienteRemoved->setCiUsuariosRelatedByIdCliente(null);
        }

        $this->collHbfComandassRelatedByIdCliente = null;
        foreach ($hbfComandassRelatedByIdCliente as $hbfComandasRelatedByIdCliente) {
            $this->addHbfComandasRelatedByIdCliente($hbfComandasRelatedByIdCliente);
        }

        $this->collHbfComandassRelatedByIdCliente = $hbfComandassRelatedByIdCliente;
        $this->collHbfComandassRelatedByIdClientePartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfComandas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfComandas objects.
     * @throws PropelException
     */
    public function countHbfComandassRelatedByIdCliente(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfComandassRelatedByIdCliente || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfComandassRelatedByIdCliente) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfComandassRelatedByIdCliente());
            }

            $query = ChildHbfComandasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdCliente($this)
                ->count($con);
        }

        return count($this->collHbfComandassRelatedByIdCliente);
    }

    /**
     * Method called to associate a ChildHbfComandas object to this object
     * through the ChildHbfComandas foreign key attribute.
     *
     * @param  ChildHbfComandas $l ChildHbfComandas
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfComandasRelatedByIdCliente(ChildHbfComandas $l)
    {
        if ($this->collHbfComandassRelatedByIdCliente === null) {
            $this->initHbfComandassRelatedByIdCliente();
            $this->collHbfComandassRelatedByIdClientePartial = true;
        }

        if (!$this->collHbfComandassRelatedByIdCliente->contains($l)) {
            $this->doAddHbfComandasRelatedByIdCliente($l);

            if ($this->hbfComandassRelatedByIdClienteScheduledForDeletion and $this->hbfComandassRelatedByIdClienteScheduledForDeletion->contains($l)) {
                $this->hbfComandassRelatedByIdClienteScheduledForDeletion->remove($this->hbfComandassRelatedByIdClienteScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfComandas $hbfComandasRelatedByIdCliente The ChildHbfComandas object to add.
     */
    protected function doAddHbfComandasRelatedByIdCliente(ChildHbfComandas $hbfComandasRelatedByIdCliente)
    {
        $this->collHbfComandassRelatedByIdCliente[]= $hbfComandasRelatedByIdCliente;
        $hbfComandasRelatedByIdCliente->setCiUsuariosRelatedByIdCliente($this);
    }

    /**
     * @param  ChildHbfComandas $hbfComandasRelatedByIdCliente The ChildHbfComandas object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfComandasRelatedByIdCliente(ChildHbfComandas $hbfComandasRelatedByIdCliente)
    {
        if ($this->getHbfComandassRelatedByIdCliente()->contains($hbfComandasRelatedByIdCliente)) {
            $pos = $this->collHbfComandassRelatedByIdCliente->search($hbfComandasRelatedByIdCliente);
            $this->collHbfComandassRelatedByIdCliente->remove($pos);
            if (null === $this->hbfComandassRelatedByIdClienteScheduledForDeletion) {
                $this->hbfComandassRelatedByIdClienteScheduledForDeletion = clone $this->collHbfComandassRelatedByIdCliente;
                $this->hbfComandassRelatedByIdClienteScheduledForDeletion->clear();
            }
            $this->hbfComandassRelatedByIdClienteScheduledForDeletion[]= clone $hbfComandasRelatedByIdCliente;
            $hbfComandasRelatedByIdCliente->setCiUsuariosRelatedByIdCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdClienteJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfComandassRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdClienteJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfComandassRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdClienteJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfComandassRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfComandassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassRelatedByIdClienteJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfComandassRelatedByIdCliente($query, $con);
    }

    /**
     * Clears out the collHbfDetallesPedidossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfDetallesPedidossRelatedByIdUserCreated()
     */
    public function clearHbfDetallesPedidossRelatedByIdUserCreated()
    {
        $this->collHbfDetallesPedidossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfDetallesPedidossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfDetallesPedidossRelatedByIdUserCreated($v = true)
    {
        $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfDetallesPedidossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfDetallesPedidossRelatedByIdUserCreated collection to an empty array (like clearcollHbfDetallesPedidossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfDetallesPedidossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfDetallesPedidossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfDetallesPedidosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfDetallesPedidossRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfDetallesPedidossRelatedByIdUserCreated->setModel('\HbfDetallesPedidos');
    }

    /**
     * Gets an array of ChildHbfDetallesPedidos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     * @throws PropelException
     */
    public function getHbfDetallesPedidossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfDetallesPedidossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfDetallesPedidossRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfDetallesPedidossRelatedByIdUserCreated();
            } else {
                $collHbfDetallesPedidossRelatedByIdUserCreated = ChildHbfDetallesPedidosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial && count($collHbfDetallesPedidossRelatedByIdUserCreated)) {
                        $this->initHbfDetallesPedidossRelatedByIdUserCreated(false);

                        foreach ($collHbfDetallesPedidossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfDetallesPedidossRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfDetallesPedidossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfDetallesPedidossRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfDetallesPedidossRelatedByIdUserCreated) {
                    foreach ($this->collHbfDetallesPedidossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfDetallesPedidossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfDetallesPedidossRelatedByIdUserCreated = $collHbfDetallesPedidossRelatedByIdUserCreated;
                $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfDetallesPedidossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfDetallesPedidos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfDetallesPedidossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfDetallesPedidossRelatedByIdUserCreated(Collection $hbfDetallesPedidossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfDetallesPedidos[] $hbfDetallesPedidossRelatedByIdUserCreatedToDelete */
        $hbfDetallesPedidossRelatedByIdUserCreatedToDelete = $this->getHbfDetallesPedidossRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfDetallesPedidossRelatedByIdUserCreated);


        $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion = $hbfDetallesPedidossRelatedByIdUserCreatedToDelete;

        foreach ($hbfDetallesPedidossRelatedByIdUserCreatedToDelete as $hbfDetallesPedidosRelatedByIdUserCreatedRemoved) {
            $hbfDetallesPedidosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfDetallesPedidossRelatedByIdUserCreated = null;
        foreach ($hbfDetallesPedidossRelatedByIdUserCreated as $hbfDetallesPedidosRelatedByIdUserCreated) {
            $this->addHbfDetallesPedidosRelatedByIdUserCreated($hbfDetallesPedidosRelatedByIdUserCreated);
        }

        $this->collHbfDetallesPedidossRelatedByIdUserCreated = $hbfDetallesPedidossRelatedByIdUserCreated;
        $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfDetallesPedidos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfDetallesPedidos objects.
     * @throws PropelException
     */
    public function countHbfDetallesPedidossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfDetallesPedidossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfDetallesPedidossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfDetallesPedidossRelatedByIdUserCreated());
            }

            $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfDetallesPedidossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfDetallesPedidos object to this object
     * through the ChildHbfDetallesPedidos foreign key attribute.
     *
     * @param  ChildHbfDetallesPedidos $l ChildHbfDetallesPedidos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfDetallesPedidosRelatedByIdUserCreated(ChildHbfDetallesPedidos $l)
    {
        if ($this->collHbfDetallesPedidossRelatedByIdUserCreated === null) {
            $this->initHbfDetallesPedidossRelatedByIdUserCreated();
            $this->collHbfDetallesPedidossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfDetallesPedidossRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfDetallesPedidosRelatedByIdUserCreated($l);

            if ($this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion and $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserCreated The ChildHbfDetallesPedidos object to add.
     */
    protected function doAddHbfDetallesPedidosRelatedByIdUserCreated(ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserCreated)
    {
        $this->collHbfDetallesPedidossRelatedByIdUserCreated[]= $hbfDetallesPedidosRelatedByIdUserCreated;
        $hbfDetallesPedidosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserCreated The ChildHbfDetallesPedidos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfDetallesPedidosRelatedByIdUserCreated(ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserCreated)
    {
        if ($this->getHbfDetallesPedidossRelatedByIdUserCreated()->contains($hbfDetallesPedidosRelatedByIdUserCreated)) {
            $pos = $this->collHbfDetallesPedidossRelatedByIdUserCreated->search($hbfDetallesPedidosRelatedByIdUserCreated);
            $this->collHbfDetallesPedidossRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfDetallesPedidossRelatedByIdUserCreated;
                $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfDetallesPedidossRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfDetallesPedidosRelatedByIdUserCreated;
            $hbfDetallesPedidosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfDetallesPedidossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossRelatedByIdUserCreatedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfDetallesPedidossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfDetallesPedidossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossRelatedByIdUserCreatedJoinHbfVasos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfVasos', $joinBehavior);

        return $this->getHbfDetallesPedidossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfDetallesPedidossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossRelatedByIdUserCreatedJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfDetallesPedidossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfDetallesPedidossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfDetallesPedidossRelatedByIdUserModified()
     */
    public function clearHbfDetallesPedidossRelatedByIdUserModified()
    {
        $this->collHbfDetallesPedidossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfDetallesPedidossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfDetallesPedidossRelatedByIdUserModified($v = true)
    {
        $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfDetallesPedidossRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfDetallesPedidossRelatedByIdUserModified collection to an empty array (like clearcollHbfDetallesPedidossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfDetallesPedidossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfDetallesPedidossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfDetallesPedidosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfDetallesPedidossRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfDetallesPedidossRelatedByIdUserModified->setModel('\HbfDetallesPedidos');
    }

    /**
     * Gets an array of ChildHbfDetallesPedidos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     * @throws PropelException
     */
    public function getHbfDetallesPedidossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfDetallesPedidossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfDetallesPedidossRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfDetallesPedidossRelatedByIdUserModified();
            } else {
                $collHbfDetallesPedidossRelatedByIdUserModified = ChildHbfDetallesPedidosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial && count($collHbfDetallesPedidossRelatedByIdUserModified)) {
                        $this->initHbfDetallesPedidossRelatedByIdUserModified(false);

                        foreach ($collHbfDetallesPedidossRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfDetallesPedidossRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfDetallesPedidossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfDetallesPedidossRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfDetallesPedidossRelatedByIdUserModified) {
                    foreach ($this->collHbfDetallesPedidossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfDetallesPedidossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfDetallesPedidossRelatedByIdUserModified = $collHbfDetallesPedidossRelatedByIdUserModified;
                $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfDetallesPedidossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfDetallesPedidos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfDetallesPedidossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfDetallesPedidossRelatedByIdUserModified(Collection $hbfDetallesPedidossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfDetallesPedidos[] $hbfDetallesPedidossRelatedByIdUserModifiedToDelete */
        $hbfDetallesPedidossRelatedByIdUserModifiedToDelete = $this->getHbfDetallesPedidossRelatedByIdUserModified(new Criteria(), $con)->diff($hbfDetallesPedidossRelatedByIdUserModified);


        $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion = $hbfDetallesPedidossRelatedByIdUserModifiedToDelete;

        foreach ($hbfDetallesPedidossRelatedByIdUserModifiedToDelete as $hbfDetallesPedidosRelatedByIdUserModifiedRemoved) {
            $hbfDetallesPedidosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfDetallesPedidossRelatedByIdUserModified = null;
        foreach ($hbfDetallesPedidossRelatedByIdUserModified as $hbfDetallesPedidosRelatedByIdUserModified) {
            $this->addHbfDetallesPedidosRelatedByIdUserModified($hbfDetallesPedidosRelatedByIdUserModified);
        }

        $this->collHbfDetallesPedidossRelatedByIdUserModified = $hbfDetallesPedidossRelatedByIdUserModified;
        $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfDetallesPedidos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfDetallesPedidos objects.
     * @throws PropelException
     */
    public function countHbfDetallesPedidossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfDetallesPedidossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfDetallesPedidossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfDetallesPedidossRelatedByIdUserModified());
            }

            $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfDetallesPedidossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfDetallesPedidos object to this object
     * through the ChildHbfDetallesPedidos foreign key attribute.
     *
     * @param  ChildHbfDetallesPedidos $l ChildHbfDetallesPedidos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfDetallesPedidosRelatedByIdUserModified(ChildHbfDetallesPedidos $l)
    {
        if ($this->collHbfDetallesPedidossRelatedByIdUserModified === null) {
            $this->initHbfDetallesPedidossRelatedByIdUserModified();
            $this->collHbfDetallesPedidossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfDetallesPedidossRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfDetallesPedidosRelatedByIdUserModified($l);

            if ($this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion and $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserModified The ChildHbfDetallesPedidos object to add.
     */
    protected function doAddHbfDetallesPedidosRelatedByIdUserModified(ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserModified)
    {
        $this->collHbfDetallesPedidossRelatedByIdUserModified[]= $hbfDetallesPedidosRelatedByIdUserModified;
        $hbfDetallesPedidosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserModified The ChildHbfDetallesPedidos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfDetallesPedidosRelatedByIdUserModified(ChildHbfDetallesPedidos $hbfDetallesPedidosRelatedByIdUserModified)
    {
        if ($this->getHbfDetallesPedidossRelatedByIdUserModified()->contains($hbfDetallesPedidosRelatedByIdUserModified)) {
            $pos = $this->collHbfDetallesPedidossRelatedByIdUserModified->search($hbfDetallesPedidosRelatedByIdUserModified);
            $this->collHbfDetallesPedidossRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfDetallesPedidossRelatedByIdUserModified;
                $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfDetallesPedidossRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfDetallesPedidosRelatedByIdUserModified;
            $hbfDetallesPedidosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfDetallesPedidossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossRelatedByIdUserModifiedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfDetallesPedidossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfDetallesPedidossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossRelatedByIdUserModifiedJoinHbfVasos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfVasos', $joinBehavior);

        return $this->getHbfDetallesPedidossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfDetallesPedidossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossRelatedByIdUserModifiedJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfDetallesPedidossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfEgresossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfEgresossRelatedByIdUserCreated()
     */
    public function clearHbfEgresossRelatedByIdUserCreated()
    {
        $this->collHbfEgresossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfEgresossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfEgresossRelatedByIdUserCreated($v = true)
    {
        $this->collHbfEgresossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfEgresossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfEgresossRelatedByIdUserCreated collection to an empty array (like clearcollHbfEgresossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfEgresossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfEgresossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfEgresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfEgresossRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfEgresossRelatedByIdUserCreated->setModel('\HbfEgresos');
    }

    /**
     * Gets an array of ChildHbfEgresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     * @throws PropelException
     */
    public function getHbfEgresossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfEgresossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresossRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfEgresossRelatedByIdUserCreated();
            } else {
                $collHbfEgresossRelatedByIdUserCreated = ChildHbfEgresosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfEgresossRelatedByIdUserCreatedPartial && count($collHbfEgresossRelatedByIdUserCreated)) {
                        $this->initHbfEgresossRelatedByIdUserCreated(false);

                        foreach ($collHbfEgresossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfEgresossRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfEgresossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfEgresossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfEgresossRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfEgresossRelatedByIdUserCreated) {
                    foreach ($this->collHbfEgresossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfEgresossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfEgresossRelatedByIdUserCreated = $collHbfEgresossRelatedByIdUserCreated;
                $this->collHbfEgresossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfEgresossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfEgresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfEgresossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfEgresossRelatedByIdUserCreated(Collection $hbfEgresossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfEgresos[] $hbfEgresossRelatedByIdUserCreatedToDelete */
        $hbfEgresossRelatedByIdUserCreatedToDelete = $this->getHbfEgresossRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfEgresossRelatedByIdUserCreated);


        $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion = $hbfEgresossRelatedByIdUserCreatedToDelete;

        foreach ($hbfEgresossRelatedByIdUserCreatedToDelete as $hbfEgresosRelatedByIdUserCreatedRemoved) {
            $hbfEgresosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfEgresossRelatedByIdUserCreated = null;
        foreach ($hbfEgresossRelatedByIdUserCreated as $hbfEgresosRelatedByIdUserCreated) {
            $this->addHbfEgresosRelatedByIdUserCreated($hbfEgresosRelatedByIdUserCreated);
        }

        $this->collHbfEgresossRelatedByIdUserCreated = $hbfEgresossRelatedByIdUserCreated;
        $this->collHbfEgresossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfEgresos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfEgresos objects.
     * @throws PropelException
     */
    public function countHbfEgresossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfEgresossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfEgresossRelatedByIdUserCreated());
            }

            $query = ChildHbfEgresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfEgresossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfEgresos object to this object
     * through the ChildHbfEgresos foreign key attribute.
     *
     * @param  ChildHbfEgresos $l ChildHbfEgresos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfEgresosRelatedByIdUserCreated(ChildHbfEgresos $l)
    {
        if ($this->collHbfEgresossRelatedByIdUserCreated === null) {
            $this->initHbfEgresossRelatedByIdUserCreated();
            $this->collHbfEgresossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfEgresossRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfEgresosRelatedByIdUserCreated($l);

            if ($this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion and $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfEgresos $hbfEgresosRelatedByIdUserCreated The ChildHbfEgresos object to add.
     */
    protected function doAddHbfEgresosRelatedByIdUserCreated(ChildHbfEgresos $hbfEgresosRelatedByIdUserCreated)
    {
        $this->collHbfEgresossRelatedByIdUserCreated[]= $hbfEgresosRelatedByIdUserCreated;
        $hbfEgresosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfEgresos $hbfEgresosRelatedByIdUserCreated The ChildHbfEgresos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfEgresosRelatedByIdUserCreated(ChildHbfEgresos $hbfEgresosRelatedByIdUserCreated)
    {
        if ($this->getHbfEgresossRelatedByIdUserCreated()->contains($hbfEgresosRelatedByIdUserCreated)) {
            $pos = $this->collHbfEgresossRelatedByIdUserCreated->search($hbfEgresosRelatedByIdUserCreated);
            $this->collHbfEgresossRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfEgresossRelatedByIdUserCreated;
                $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfEgresossRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfEgresosRelatedByIdUserCreated;
            $hbfEgresosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdUserCreatedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdUserCreatedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdUserCreatedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfEgresossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfEgresossRelatedByIdUserModified()
     */
    public function clearHbfEgresossRelatedByIdUserModified()
    {
        $this->collHbfEgresossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfEgresossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfEgresossRelatedByIdUserModified($v = true)
    {
        $this->collHbfEgresossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfEgresossRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfEgresossRelatedByIdUserModified collection to an empty array (like clearcollHbfEgresossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfEgresossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfEgresossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfEgresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfEgresossRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfEgresossRelatedByIdUserModified->setModel('\HbfEgresos');
    }

    /**
     * Gets an array of ChildHbfEgresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     * @throws PropelException
     */
    public function getHbfEgresossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfEgresossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresossRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfEgresossRelatedByIdUserModified();
            } else {
                $collHbfEgresossRelatedByIdUserModified = ChildHbfEgresosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfEgresossRelatedByIdUserModifiedPartial && count($collHbfEgresossRelatedByIdUserModified)) {
                        $this->initHbfEgresossRelatedByIdUserModified(false);

                        foreach ($collHbfEgresossRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfEgresossRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfEgresossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfEgresossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfEgresossRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfEgresossRelatedByIdUserModified) {
                    foreach ($this->collHbfEgresossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfEgresossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfEgresossRelatedByIdUserModified = $collHbfEgresossRelatedByIdUserModified;
                $this->collHbfEgresossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfEgresossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfEgresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfEgresossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfEgresossRelatedByIdUserModified(Collection $hbfEgresossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfEgresos[] $hbfEgresossRelatedByIdUserModifiedToDelete */
        $hbfEgresossRelatedByIdUserModifiedToDelete = $this->getHbfEgresossRelatedByIdUserModified(new Criteria(), $con)->diff($hbfEgresossRelatedByIdUserModified);


        $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion = $hbfEgresossRelatedByIdUserModifiedToDelete;

        foreach ($hbfEgresossRelatedByIdUserModifiedToDelete as $hbfEgresosRelatedByIdUserModifiedRemoved) {
            $hbfEgresosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfEgresossRelatedByIdUserModified = null;
        foreach ($hbfEgresossRelatedByIdUserModified as $hbfEgresosRelatedByIdUserModified) {
            $this->addHbfEgresosRelatedByIdUserModified($hbfEgresosRelatedByIdUserModified);
        }

        $this->collHbfEgresossRelatedByIdUserModified = $hbfEgresossRelatedByIdUserModified;
        $this->collHbfEgresossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfEgresos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfEgresos objects.
     * @throws PropelException
     */
    public function countHbfEgresossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfEgresossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfEgresossRelatedByIdUserModified());
            }

            $query = ChildHbfEgresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfEgresossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfEgresos object to this object
     * through the ChildHbfEgresos foreign key attribute.
     *
     * @param  ChildHbfEgresos $l ChildHbfEgresos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfEgresosRelatedByIdUserModified(ChildHbfEgresos $l)
    {
        if ($this->collHbfEgresossRelatedByIdUserModified === null) {
            $this->initHbfEgresossRelatedByIdUserModified();
            $this->collHbfEgresossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfEgresossRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfEgresosRelatedByIdUserModified($l);

            if ($this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion and $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfEgresos $hbfEgresosRelatedByIdUserModified The ChildHbfEgresos object to add.
     */
    protected function doAddHbfEgresosRelatedByIdUserModified(ChildHbfEgresos $hbfEgresosRelatedByIdUserModified)
    {
        $this->collHbfEgresossRelatedByIdUserModified[]= $hbfEgresosRelatedByIdUserModified;
        $hbfEgresosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfEgresos $hbfEgresosRelatedByIdUserModified The ChildHbfEgresos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfEgresosRelatedByIdUserModified(ChildHbfEgresos $hbfEgresosRelatedByIdUserModified)
    {
        if ($this->getHbfEgresossRelatedByIdUserModified()->contains($hbfEgresosRelatedByIdUserModified)) {
            $pos = $this->collHbfEgresossRelatedByIdUserModified->search($hbfEgresosRelatedByIdUserModified);
            $this->collHbfEgresossRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfEgresossRelatedByIdUserModified;
                $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfEgresossRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfEgresosRelatedByIdUserModified;
            $hbfEgresosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdUserModifiedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdUserModifiedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdUserModifiedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfEgresossRelatedByIdCliente collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfEgresossRelatedByIdCliente()
     */
    public function clearHbfEgresossRelatedByIdCliente()
    {
        $this->collHbfEgresossRelatedByIdCliente = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfEgresossRelatedByIdCliente collection loaded partially.
     */
    public function resetPartialHbfEgresossRelatedByIdCliente($v = true)
    {
        $this->collHbfEgresossRelatedByIdClientePartial = $v;
    }

    /**
     * Initializes the collHbfEgresossRelatedByIdCliente collection.
     *
     * By default this just sets the collHbfEgresossRelatedByIdCliente collection to an empty array (like clearcollHbfEgresossRelatedByIdCliente());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfEgresossRelatedByIdCliente($overrideExisting = true)
    {
        if (null !== $this->collHbfEgresossRelatedByIdCliente && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfEgresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfEgresossRelatedByIdCliente = new $collectionClassName;
        $this->collHbfEgresossRelatedByIdCliente->setModel('\HbfEgresos');
    }

    /**
     * Gets an array of ChildHbfEgresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     * @throws PropelException
     */
    public function getHbfEgresossRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfEgresossRelatedByIdCliente || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresossRelatedByIdCliente) {
                // return empty collection
                $this->initHbfEgresossRelatedByIdCliente();
            } else {
                $collHbfEgresossRelatedByIdCliente = ChildHbfEgresosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfEgresossRelatedByIdClientePartial && count($collHbfEgresossRelatedByIdCliente)) {
                        $this->initHbfEgresossRelatedByIdCliente(false);

                        foreach ($collHbfEgresossRelatedByIdCliente as $obj) {
                            if (false == $this->collHbfEgresossRelatedByIdCliente->contains($obj)) {
                                $this->collHbfEgresossRelatedByIdCliente->append($obj);
                            }
                        }

                        $this->collHbfEgresossRelatedByIdClientePartial = true;
                    }

                    return $collHbfEgresossRelatedByIdCliente;
                }

                if ($partial && $this->collHbfEgresossRelatedByIdCliente) {
                    foreach ($this->collHbfEgresossRelatedByIdCliente as $obj) {
                        if ($obj->isNew()) {
                            $collHbfEgresossRelatedByIdCliente[] = $obj;
                        }
                    }
                }

                $this->collHbfEgresossRelatedByIdCliente = $collHbfEgresossRelatedByIdCliente;
                $this->collHbfEgresossRelatedByIdClientePartial = false;
            }
        }

        return $this->collHbfEgresossRelatedByIdCliente;
    }

    /**
     * Sets a collection of ChildHbfEgresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfEgresossRelatedByIdCliente A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfEgresossRelatedByIdCliente(Collection $hbfEgresossRelatedByIdCliente, ConnectionInterface $con = null)
    {
        /** @var ChildHbfEgresos[] $hbfEgresossRelatedByIdClienteToDelete */
        $hbfEgresossRelatedByIdClienteToDelete = $this->getHbfEgresossRelatedByIdCliente(new Criteria(), $con)->diff($hbfEgresossRelatedByIdCliente);


        $this->hbfEgresossRelatedByIdClienteScheduledForDeletion = $hbfEgresossRelatedByIdClienteToDelete;

        foreach ($hbfEgresossRelatedByIdClienteToDelete as $hbfEgresosRelatedByIdClienteRemoved) {
            $hbfEgresosRelatedByIdClienteRemoved->setCiUsuariosRelatedByIdCliente(null);
        }

        $this->collHbfEgresossRelatedByIdCliente = null;
        foreach ($hbfEgresossRelatedByIdCliente as $hbfEgresosRelatedByIdCliente) {
            $this->addHbfEgresosRelatedByIdCliente($hbfEgresosRelatedByIdCliente);
        }

        $this->collHbfEgresossRelatedByIdCliente = $hbfEgresossRelatedByIdCliente;
        $this->collHbfEgresossRelatedByIdClientePartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfEgresos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfEgresos objects.
     * @throws PropelException
     */
    public function countHbfEgresossRelatedByIdCliente(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfEgresossRelatedByIdCliente || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresossRelatedByIdCliente) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfEgresossRelatedByIdCliente());
            }

            $query = ChildHbfEgresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdCliente($this)
                ->count($con);
        }

        return count($this->collHbfEgresossRelatedByIdCliente);
    }

    /**
     * Method called to associate a ChildHbfEgresos object to this object
     * through the ChildHbfEgresos foreign key attribute.
     *
     * @param  ChildHbfEgresos $l ChildHbfEgresos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfEgresosRelatedByIdCliente(ChildHbfEgresos $l)
    {
        if ($this->collHbfEgresossRelatedByIdCliente === null) {
            $this->initHbfEgresossRelatedByIdCliente();
            $this->collHbfEgresossRelatedByIdClientePartial = true;
        }

        if (!$this->collHbfEgresossRelatedByIdCliente->contains($l)) {
            $this->doAddHbfEgresosRelatedByIdCliente($l);

            if ($this->hbfEgresossRelatedByIdClienteScheduledForDeletion and $this->hbfEgresossRelatedByIdClienteScheduledForDeletion->contains($l)) {
                $this->hbfEgresossRelatedByIdClienteScheduledForDeletion->remove($this->hbfEgresossRelatedByIdClienteScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfEgresos $hbfEgresosRelatedByIdCliente The ChildHbfEgresos object to add.
     */
    protected function doAddHbfEgresosRelatedByIdCliente(ChildHbfEgresos $hbfEgresosRelatedByIdCliente)
    {
        $this->collHbfEgresossRelatedByIdCliente[]= $hbfEgresosRelatedByIdCliente;
        $hbfEgresosRelatedByIdCliente->setCiUsuariosRelatedByIdCliente($this);
    }

    /**
     * @param  ChildHbfEgresos $hbfEgresosRelatedByIdCliente The ChildHbfEgresos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfEgresosRelatedByIdCliente(ChildHbfEgresos $hbfEgresosRelatedByIdCliente)
    {
        if ($this->getHbfEgresossRelatedByIdCliente()->contains($hbfEgresosRelatedByIdCliente)) {
            $pos = $this->collHbfEgresossRelatedByIdCliente->search($hbfEgresosRelatedByIdCliente);
            $this->collHbfEgresossRelatedByIdCliente->remove($pos);
            if (null === $this->hbfEgresossRelatedByIdClienteScheduledForDeletion) {
                $this->hbfEgresossRelatedByIdClienteScheduledForDeletion = clone $this->collHbfEgresossRelatedByIdCliente;
                $this->hbfEgresossRelatedByIdClienteScheduledForDeletion->clear();
            }
            $this->hbfEgresossRelatedByIdClienteScheduledForDeletion[]= $hbfEgresosRelatedByIdCliente;
            $hbfEgresosRelatedByIdCliente->setCiUsuariosRelatedByIdCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdClienteJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdClienteJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfEgresossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossRelatedByIdClienteJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfEgresossRelatedByIdCliente($query, $con);
    }

    /**
     * Clears out the collHbfIngresossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfIngresossRelatedByIdUserCreated()
     */
    public function clearHbfIngresossRelatedByIdUserCreated()
    {
        $this->collHbfIngresossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfIngresossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfIngresossRelatedByIdUserCreated($v = true)
    {
        $this->collHbfIngresossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfIngresossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfIngresossRelatedByIdUserCreated collection to an empty array (like clearcollHbfIngresossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfIngresossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfIngresossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfIngresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfIngresossRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfIngresossRelatedByIdUserCreated->setModel('\HbfIngresos');
    }

    /**
     * Gets an array of ChildHbfIngresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     * @throws PropelException
     */
    public function getHbfIngresossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfIngresossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresossRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfIngresossRelatedByIdUserCreated();
            } else {
                $collHbfIngresossRelatedByIdUserCreated = ChildHbfIngresosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfIngresossRelatedByIdUserCreatedPartial && count($collHbfIngresossRelatedByIdUserCreated)) {
                        $this->initHbfIngresossRelatedByIdUserCreated(false);

                        foreach ($collHbfIngresossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfIngresossRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfIngresossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfIngresossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfIngresossRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfIngresossRelatedByIdUserCreated) {
                    foreach ($this->collHbfIngresossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfIngresossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfIngresossRelatedByIdUserCreated = $collHbfIngresossRelatedByIdUserCreated;
                $this->collHbfIngresossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfIngresossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfIngresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfIngresossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfIngresossRelatedByIdUserCreated(Collection $hbfIngresossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfIngresos[] $hbfIngresossRelatedByIdUserCreatedToDelete */
        $hbfIngresossRelatedByIdUserCreatedToDelete = $this->getHbfIngresossRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfIngresossRelatedByIdUserCreated);


        $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion = $hbfIngresossRelatedByIdUserCreatedToDelete;

        foreach ($hbfIngresossRelatedByIdUserCreatedToDelete as $hbfIngresosRelatedByIdUserCreatedRemoved) {
            $hbfIngresosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfIngresossRelatedByIdUserCreated = null;
        foreach ($hbfIngresossRelatedByIdUserCreated as $hbfIngresosRelatedByIdUserCreated) {
            $this->addHbfIngresosRelatedByIdUserCreated($hbfIngresosRelatedByIdUserCreated);
        }

        $this->collHbfIngresossRelatedByIdUserCreated = $hbfIngresossRelatedByIdUserCreated;
        $this->collHbfIngresossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfIngresos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfIngresos objects.
     * @throws PropelException
     */
    public function countHbfIngresossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfIngresossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfIngresossRelatedByIdUserCreated());
            }

            $query = ChildHbfIngresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfIngresossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfIngresos object to this object
     * through the ChildHbfIngresos foreign key attribute.
     *
     * @param  ChildHbfIngresos $l ChildHbfIngresos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfIngresosRelatedByIdUserCreated(ChildHbfIngresos $l)
    {
        if ($this->collHbfIngresossRelatedByIdUserCreated === null) {
            $this->initHbfIngresossRelatedByIdUserCreated();
            $this->collHbfIngresossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfIngresossRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfIngresosRelatedByIdUserCreated($l);

            if ($this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion and $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfIngresos $hbfIngresosRelatedByIdUserCreated The ChildHbfIngresos object to add.
     */
    protected function doAddHbfIngresosRelatedByIdUserCreated(ChildHbfIngresos $hbfIngresosRelatedByIdUserCreated)
    {
        $this->collHbfIngresossRelatedByIdUserCreated[]= $hbfIngresosRelatedByIdUserCreated;
        $hbfIngresosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfIngresos $hbfIngresosRelatedByIdUserCreated The ChildHbfIngresos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfIngresosRelatedByIdUserCreated(ChildHbfIngresos $hbfIngresosRelatedByIdUserCreated)
    {
        if ($this->getHbfIngresossRelatedByIdUserCreated()->contains($hbfIngresosRelatedByIdUserCreated)) {
            $pos = $this->collHbfIngresossRelatedByIdUserCreated->search($hbfIngresosRelatedByIdUserCreated);
            $this->collHbfIngresossRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfIngresossRelatedByIdUserCreated;
                $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfIngresossRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfIngresosRelatedByIdUserCreated;
            $hbfIngresosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdUserCreatedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdUserCreatedJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdUserCreatedJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfIngresossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfIngresossRelatedByIdUserModified()
     */
    public function clearHbfIngresossRelatedByIdUserModified()
    {
        $this->collHbfIngresossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfIngresossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfIngresossRelatedByIdUserModified($v = true)
    {
        $this->collHbfIngresossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfIngresossRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfIngresossRelatedByIdUserModified collection to an empty array (like clearcollHbfIngresossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfIngresossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfIngresossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfIngresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfIngresossRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfIngresossRelatedByIdUserModified->setModel('\HbfIngresos');
    }

    /**
     * Gets an array of ChildHbfIngresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     * @throws PropelException
     */
    public function getHbfIngresossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfIngresossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresossRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfIngresossRelatedByIdUserModified();
            } else {
                $collHbfIngresossRelatedByIdUserModified = ChildHbfIngresosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfIngresossRelatedByIdUserModifiedPartial && count($collHbfIngresossRelatedByIdUserModified)) {
                        $this->initHbfIngresossRelatedByIdUserModified(false);

                        foreach ($collHbfIngresossRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfIngresossRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfIngresossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfIngresossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfIngresossRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfIngresossRelatedByIdUserModified) {
                    foreach ($this->collHbfIngresossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfIngresossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfIngresossRelatedByIdUserModified = $collHbfIngresossRelatedByIdUserModified;
                $this->collHbfIngresossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfIngresossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfIngresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfIngresossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfIngresossRelatedByIdUserModified(Collection $hbfIngresossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfIngresos[] $hbfIngresossRelatedByIdUserModifiedToDelete */
        $hbfIngresossRelatedByIdUserModifiedToDelete = $this->getHbfIngresossRelatedByIdUserModified(new Criteria(), $con)->diff($hbfIngresossRelatedByIdUserModified);


        $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion = $hbfIngresossRelatedByIdUserModifiedToDelete;

        foreach ($hbfIngresossRelatedByIdUserModifiedToDelete as $hbfIngresosRelatedByIdUserModifiedRemoved) {
            $hbfIngresosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfIngresossRelatedByIdUserModified = null;
        foreach ($hbfIngresossRelatedByIdUserModified as $hbfIngresosRelatedByIdUserModified) {
            $this->addHbfIngresosRelatedByIdUserModified($hbfIngresosRelatedByIdUserModified);
        }

        $this->collHbfIngresossRelatedByIdUserModified = $hbfIngresossRelatedByIdUserModified;
        $this->collHbfIngresossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfIngresos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfIngresos objects.
     * @throws PropelException
     */
    public function countHbfIngresossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfIngresossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfIngresossRelatedByIdUserModified());
            }

            $query = ChildHbfIngresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfIngresossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfIngresos object to this object
     * through the ChildHbfIngresos foreign key attribute.
     *
     * @param  ChildHbfIngresos $l ChildHbfIngresos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfIngresosRelatedByIdUserModified(ChildHbfIngresos $l)
    {
        if ($this->collHbfIngresossRelatedByIdUserModified === null) {
            $this->initHbfIngresossRelatedByIdUserModified();
            $this->collHbfIngresossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfIngresossRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfIngresosRelatedByIdUserModified($l);

            if ($this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion and $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfIngresos $hbfIngresosRelatedByIdUserModified The ChildHbfIngresos object to add.
     */
    protected function doAddHbfIngresosRelatedByIdUserModified(ChildHbfIngresos $hbfIngresosRelatedByIdUserModified)
    {
        $this->collHbfIngresossRelatedByIdUserModified[]= $hbfIngresosRelatedByIdUserModified;
        $hbfIngresosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfIngresos $hbfIngresosRelatedByIdUserModified The ChildHbfIngresos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfIngresosRelatedByIdUserModified(ChildHbfIngresos $hbfIngresosRelatedByIdUserModified)
    {
        if ($this->getHbfIngresossRelatedByIdUserModified()->contains($hbfIngresosRelatedByIdUserModified)) {
            $pos = $this->collHbfIngresossRelatedByIdUserModified->search($hbfIngresosRelatedByIdUserModified);
            $this->collHbfIngresossRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfIngresossRelatedByIdUserModified;
                $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfIngresossRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfIngresosRelatedByIdUserModified;
            $hbfIngresosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdUserModifiedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdUserModifiedJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdUserModifiedJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfIngresossRelatedByIdCliente collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfIngresossRelatedByIdCliente()
     */
    public function clearHbfIngresossRelatedByIdCliente()
    {
        $this->collHbfIngresossRelatedByIdCliente = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfIngresossRelatedByIdCliente collection loaded partially.
     */
    public function resetPartialHbfIngresossRelatedByIdCliente($v = true)
    {
        $this->collHbfIngresossRelatedByIdClientePartial = $v;
    }

    /**
     * Initializes the collHbfIngresossRelatedByIdCliente collection.
     *
     * By default this just sets the collHbfIngresossRelatedByIdCliente collection to an empty array (like clearcollHbfIngresossRelatedByIdCliente());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfIngresossRelatedByIdCliente($overrideExisting = true)
    {
        if (null !== $this->collHbfIngresossRelatedByIdCliente && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfIngresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfIngresossRelatedByIdCliente = new $collectionClassName;
        $this->collHbfIngresossRelatedByIdCliente->setModel('\HbfIngresos');
    }

    /**
     * Gets an array of ChildHbfIngresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     * @throws PropelException
     */
    public function getHbfIngresossRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfIngresossRelatedByIdCliente || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresossRelatedByIdCliente) {
                // return empty collection
                $this->initHbfIngresossRelatedByIdCliente();
            } else {
                $collHbfIngresossRelatedByIdCliente = ChildHbfIngresosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfIngresossRelatedByIdClientePartial && count($collHbfIngresossRelatedByIdCliente)) {
                        $this->initHbfIngresossRelatedByIdCliente(false);

                        foreach ($collHbfIngresossRelatedByIdCliente as $obj) {
                            if (false == $this->collHbfIngresossRelatedByIdCliente->contains($obj)) {
                                $this->collHbfIngresossRelatedByIdCliente->append($obj);
                            }
                        }

                        $this->collHbfIngresossRelatedByIdClientePartial = true;
                    }

                    return $collHbfIngresossRelatedByIdCliente;
                }

                if ($partial && $this->collHbfIngresossRelatedByIdCliente) {
                    foreach ($this->collHbfIngresossRelatedByIdCliente as $obj) {
                        if ($obj->isNew()) {
                            $collHbfIngresossRelatedByIdCliente[] = $obj;
                        }
                    }
                }

                $this->collHbfIngresossRelatedByIdCliente = $collHbfIngresossRelatedByIdCliente;
                $this->collHbfIngresossRelatedByIdClientePartial = false;
            }
        }

        return $this->collHbfIngresossRelatedByIdCliente;
    }

    /**
     * Sets a collection of ChildHbfIngresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfIngresossRelatedByIdCliente A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfIngresossRelatedByIdCliente(Collection $hbfIngresossRelatedByIdCliente, ConnectionInterface $con = null)
    {
        /** @var ChildHbfIngresos[] $hbfIngresossRelatedByIdClienteToDelete */
        $hbfIngresossRelatedByIdClienteToDelete = $this->getHbfIngresossRelatedByIdCliente(new Criteria(), $con)->diff($hbfIngresossRelatedByIdCliente);


        $this->hbfIngresossRelatedByIdClienteScheduledForDeletion = $hbfIngresossRelatedByIdClienteToDelete;

        foreach ($hbfIngresossRelatedByIdClienteToDelete as $hbfIngresosRelatedByIdClienteRemoved) {
            $hbfIngresosRelatedByIdClienteRemoved->setCiUsuariosRelatedByIdCliente(null);
        }

        $this->collHbfIngresossRelatedByIdCliente = null;
        foreach ($hbfIngresossRelatedByIdCliente as $hbfIngresosRelatedByIdCliente) {
            $this->addHbfIngresosRelatedByIdCliente($hbfIngresosRelatedByIdCliente);
        }

        $this->collHbfIngresossRelatedByIdCliente = $hbfIngresossRelatedByIdCliente;
        $this->collHbfIngresossRelatedByIdClientePartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfIngresos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfIngresos objects.
     * @throws PropelException
     */
    public function countHbfIngresossRelatedByIdCliente(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfIngresossRelatedByIdCliente || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresossRelatedByIdCliente) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfIngresossRelatedByIdCliente());
            }

            $query = ChildHbfIngresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdCliente($this)
                ->count($con);
        }

        return count($this->collHbfIngresossRelatedByIdCliente);
    }

    /**
     * Method called to associate a ChildHbfIngresos object to this object
     * through the ChildHbfIngresos foreign key attribute.
     *
     * @param  ChildHbfIngresos $l ChildHbfIngresos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfIngresosRelatedByIdCliente(ChildHbfIngresos $l)
    {
        if ($this->collHbfIngresossRelatedByIdCliente === null) {
            $this->initHbfIngresossRelatedByIdCliente();
            $this->collHbfIngresossRelatedByIdClientePartial = true;
        }

        if (!$this->collHbfIngresossRelatedByIdCliente->contains($l)) {
            $this->doAddHbfIngresosRelatedByIdCliente($l);

            if ($this->hbfIngresossRelatedByIdClienteScheduledForDeletion and $this->hbfIngresossRelatedByIdClienteScheduledForDeletion->contains($l)) {
                $this->hbfIngresossRelatedByIdClienteScheduledForDeletion->remove($this->hbfIngresossRelatedByIdClienteScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfIngresos $hbfIngresosRelatedByIdCliente The ChildHbfIngresos object to add.
     */
    protected function doAddHbfIngresosRelatedByIdCliente(ChildHbfIngresos $hbfIngresosRelatedByIdCliente)
    {
        $this->collHbfIngresossRelatedByIdCliente[]= $hbfIngresosRelatedByIdCliente;
        $hbfIngresosRelatedByIdCliente->setCiUsuariosRelatedByIdCliente($this);
    }

    /**
     * @param  ChildHbfIngresos $hbfIngresosRelatedByIdCliente The ChildHbfIngresos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfIngresosRelatedByIdCliente(ChildHbfIngresos $hbfIngresosRelatedByIdCliente)
    {
        if ($this->getHbfIngresossRelatedByIdCliente()->contains($hbfIngresosRelatedByIdCliente)) {
            $pos = $this->collHbfIngresossRelatedByIdCliente->search($hbfIngresosRelatedByIdCliente);
            $this->collHbfIngresossRelatedByIdCliente->remove($pos);
            if (null === $this->hbfIngresossRelatedByIdClienteScheduledForDeletion) {
                $this->hbfIngresossRelatedByIdClienteScheduledForDeletion = clone $this->collHbfIngresossRelatedByIdCliente;
                $this->hbfIngresossRelatedByIdClienteScheduledForDeletion->clear();
            }
            $this->hbfIngresossRelatedByIdClienteScheduledForDeletion[]= $hbfIngresosRelatedByIdCliente;
            $hbfIngresosRelatedByIdCliente->setCiUsuariosRelatedByIdCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdClienteJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdClienteJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfIngresossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossRelatedByIdClienteJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfIngresossRelatedByIdCliente($query, $con);
    }

    /**
     * Clears out the collHbfPorcionessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfPorcionessRelatedByIdUserCreated()
     */
    public function clearHbfPorcionessRelatedByIdUserCreated()
    {
        $this->collHbfPorcionessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfPorcionessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfPorcionessRelatedByIdUserCreated($v = true)
    {
        $this->collHbfPorcionessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfPorcionessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfPorcionessRelatedByIdUserCreated collection to an empty array (like clearcollHbfPorcionessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfPorcionessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfPorcionessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfPorcionesTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfPorcionessRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfPorcionessRelatedByIdUserCreated->setModel('\HbfPorciones');
    }

    /**
     * Gets an array of ChildHbfPorciones objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfPorciones[] List of ChildHbfPorciones objects
     * @throws PropelException
     */
    public function getHbfPorcionessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPorcionessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfPorcionessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfPorcionessRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfPorcionessRelatedByIdUserCreated();
            } else {
                $collHbfPorcionessRelatedByIdUserCreated = ChildHbfPorcionesQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfPorcionessRelatedByIdUserCreatedPartial && count($collHbfPorcionessRelatedByIdUserCreated)) {
                        $this->initHbfPorcionessRelatedByIdUserCreated(false);

                        foreach ($collHbfPorcionessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfPorcionessRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfPorcionessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfPorcionessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfPorcionessRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfPorcionessRelatedByIdUserCreated) {
                    foreach ($this->collHbfPorcionessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfPorcionessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfPorcionessRelatedByIdUserCreated = $collHbfPorcionessRelatedByIdUserCreated;
                $this->collHbfPorcionessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfPorcionessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfPorciones objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfPorcionessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfPorcionessRelatedByIdUserCreated(Collection $hbfPorcionessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPorciones[] $hbfPorcionessRelatedByIdUserCreatedToDelete */
        $hbfPorcionessRelatedByIdUserCreatedToDelete = $this->getHbfPorcionessRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfPorcionessRelatedByIdUserCreated);


        $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion = $hbfPorcionessRelatedByIdUserCreatedToDelete;

        foreach ($hbfPorcionessRelatedByIdUserCreatedToDelete as $hbfPorcionesRelatedByIdUserCreatedRemoved) {
            $hbfPorcionesRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfPorcionessRelatedByIdUserCreated = null;
        foreach ($hbfPorcionessRelatedByIdUserCreated as $hbfPorcionesRelatedByIdUserCreated) {
            $this->addHbfPorcionesRelatedByIdUserCreated($hbfPorcionesRelatedByIdUserCreated);
        }

        $this->collHbfPorcionessRelatedByIdUserCreated = $hbfPorcionessRelatedByIdUserCreated;
        $this->collHbfPorcionessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfPorciones objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfPorciones objects.
     * @throws PropelException
     */
    public function countHbfPorcionessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPorcionessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfPorcionessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfPorcionessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfPorcionessRelatedByIdUserCreated());
            }

            $query = ChildHbfPorcionesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfPorcionessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfPorciones object to this object
     * through the ChildHbfPorciones foreign key attribute.
     *
     * @param  ChildHbfPorciones $l ChildHbfPorciones
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfPorcionesRelatedByIdUserCreated(ChildHbfPorciones $l)
    {
        if ($this->collHbfPorcionessRelatedByIdUserCreated === null) {
            $this->initHbfPorcionessRelatedByIdUserCreated();
            $this->collHbfPorcionessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfPorcionessRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfPorcionesRelatedByIdUserCreated($l);

            if ($this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion and $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfPorciones $hbfPorcionesRelatedByIdUserCreated The ChildHbfPorciones object to add.
     */
    protected function doAddHbfPorcionesRelatedByIdUserCreated(ChildHbfPorciones $hbfPorcionesRelatedByIdUserCreated)
    {
        $this->collHbfPorcionessRelatedByIdUserCreated[]= $hbfPorcionesRelatedByIdUserCreated;
        $hbfPorcionesRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfPorciones $hbfPorcionesRelatedByIdUserCreated The ChildHbfPorciones object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfPorcionesRelatedByIdUserCreated(ChildHbfPorciones $hbfPorcionesRelatedByIdUserCreated)
    {
        if ($this->getHbfPorcionessRelatedByIdUserCreated()->contains($hbfPorcionesRelatedByIdUserCreated)) {
            $pos = $this->collHbfPorcionessRelatedByIdUserCreated->search($hbfPorcionesRelatedByIdUserCreated);
            $this->collHbfPorcionessRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfPorcionessRelatedByIdUserCreated;
                $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfPorcionessRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfPorcionesRelatedByIdUserCreated;
            $hbfPorcionesRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPorcionessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPorciones[] List of ChildHbfPorciones objects
     */
    public function getHbfPorcionessRelatedByIdUserCreatedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPorcionesQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfPorcionessRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfPorcionessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfPorcionessRelatedByIdUserModified()
     */
    public function clearHbfPorcionessRelatedByIdUserModified()
    {
        $this->collHbfPorcionessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfPorcionessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfPorcionessRelatedByIdUserModified($v = true)
    {
        $this->collHbfPorcionessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfPorcionessRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfPorcionessRelatedByIdUserModified collection to an empty array (like clearcollHbfPorcionessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfPorcionessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfPorcionessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfPorcionesTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfPorcionessRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfPorcionessRelatedByIdUserModified->setModel('\HbfPorciones');
    }

    /**
     * Gets an array of ChildHbfPorciones objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfPorciones[] List of ChildHbfPorciones objects
     * @throws PropelException
     */
    public function getHbfPorcionessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPorcionessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfPorcionessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfPorcionessRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfPorcionessRelatedByIdUserModified();
            } else {
                $collHbfPorcionessRelatedByIdUserModified = ChildHbfPorcionesQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfPorcionessRelatedByIdUserModifiedPartial && count($collHbfPorcionessRelatedByIdUserModified)) {
                        $this->initHbfPorcionessRelatedByIdUserModified(false);

                        foreach ($collHbfPorcionessRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfPorcionessRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfPorcionessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfPorcionessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfPorcionessRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfPorcionessRelatedByIdUserModified) {
                    foreach ($this->collHbfPorcionessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfPorcionessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfPorcionessRelatedByIdUserModified = $collHbfPorcionessRelatedByIdUserModified;
                $this->collHbfPorcionessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfPorcionessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfPorciones objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfPorcionessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfPorcionessRelatedByIdUserModified(Collection $hbfPorcionessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPorciones[] $hbfPorcionessRelatedByIdUserModifiedToDelete */
        $hbfPorcionessRelatedByIdUserModifiedToDelete = $this->getHbfPorcionessRelatedByIdUserModified(new Criteria(), $con)->diff($hbfPorcionessRelatedByIdUserModified);


        $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion = $hbfPorcionessRelatedByIdUserModifiedToDelete;

        foreach ($hbfPorcionessRelatedByIdUserModifiedToDelete as $hbfPorcionesRelatedByIdUserModifiedRemoved) {
            $hbfPorcionesRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfPorcionessRelatedByIdUserModified = null;
        foreach ($hbfPorcionessRelatedByIdUserModified as $hbfPorcionesRelatedByIdUserModified) {
            $this->addHbfPorcionesRelatedByIdUserModified($hbfPorcionesRelatedByIdUserModified);
        }

        $this->collHbfPorcionessRelatedByIdUserModified = $hbfPorcionessRelatedByIdUserModified;
        $this->collHbfPorcionessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfPorciones objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfPorciones objects.
     * @throws PropelException
     */
    public function countHbfPorcionessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPorcionessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfPorcionessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfPorcionessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfPorcionessRelatedByIdUserModified());
            }

            $query = ChildHbfPorcionesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfPorcionessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfPorciones object to this object
     * through the ChildHbfPorciones foreign key attribute.
     *
     * @param  ChildHbfPorciones $l ChildHbfPorciones
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfPorcionesRelatedByIdUserModified(ChildHbfPorciones $l)
    {
        if ($this->collHbfPorcionessRelatedByIdUserModified === null) {
            $this->initHbfPorcionessRelatedByIdUserModified();
            $this->collHbfPorcionessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfPorcionessRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfPorcionesRelatedByIdUserModified($l);

            if ($this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion and $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfPorciones $hbfPorcionesRelatedByIdUserModified The ChildHbfPorciones object to add.
     */
    protected function doAddHbfPorcionesRelatedByIdUserModified(ChildHbfPorciones $hbfPorcionesRelatedByIdUserModified)
    {
        $this->collHbfPorcionessRelatedByIdUserModified[]= $hbfPorcionesRelatedByIdUserModified;
        $hbfPorcionesRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfPorciones $hbfPorcionesRelatedByIdUserModified The ChildHbfPorciones object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfPorcionesRelatedByIdUserModified(ChildHbfPorciones $hbfPorcionesRelatedByIdUserModified)
    {
        if ($this->getHbfPorcionessRelatedByIdUserModified()->contains($hbfPorcionesRelatedByIdUserModified)) {
            $pos = $this->collHbfPorcionessRelatedByIdUserModified->search($hbfPorcionesRelatedByIdUserModified);
            $this->collHbfPorcionessRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfPorcionessRelatedByIdUserModified;
                $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfPorcionessRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfPorcionesRelatedByIdUserModified;
            $hbfPorcionesRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPorcionessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPorciones[] List of ChildHbfPorciones objects
     */
    public function getHbfPorcionessRelatedByIdUserModifiedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPorcionesQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfPorcionessRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfPrepagossRelatedByIdCliente collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfPrepagossRelatedByIdCliente()
     */
    public function clearHbfPrepagossRelatedByIdCliente()
    {
        $this->collHbfPrepagossRelatedByIdCliente = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfPrepagossRelatedByIdCliente collection loaded partially.
     */
    public function resetPartialHbfPrepagossRelatedByIdCliente($v = true)
    {
        $this->collHbfPrepagossRelatedByIdClientePartial = $v;
    }

    /**
     * Initializes the collHbfPrepagossRelatedByIdCliente collection.
     *
     * By default this just sets the collHbfPrepagossRelatedByIdCliente collection to an empty array (like clearcollHbfPrepagossRelatedByIdCliente());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfPrepagossRelatedByIdCliente($overrideExisting = true)
    {
        if (null !== $this->collHbfPrepagossRelatedByIdCliente && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfPrepagosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfPrepagossRelatedByIdCliente = new $collectionClassName;
        $this->collHbfPrepagossRelatedByIdCliente->setModel('\HbfPrepagos');
    }

    /**
     * Gets an array of ChildHbfPrepagos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     * @throws PropelException
     */
    public function getHbfPrepagossRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfPrepagossRelatedByIdCliente || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagossRelatedByIdCliente) {
                // return empty collection
                $this->initHbfPrepagossRelatedByIdCliente();
            } else {
                $collHbfPrepagossRelatedByIdCliente = ChildHbfPrepagosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfPrepagossRelatedByIdClientePartial && count($collHbfPrepagossRelatedByIdCliente)) {
                        $this->initHbfPrepagossRelatedByIdCliente(false);

                        foreach ($collHbfPrepagossRelatedByIdCliente as $obj) {
                            if (false == $this->collHbfPrepagossRelatedByIdCliente->contains($obj)) {
                                $this->collHbfPrepagossRelatedByIdCliente->append($obj);
                            }
                        }

                        $this->collHbfPrepagossRelatedByIdClientePartial = true;
                    }

                    return $collHbfPrepagossRelatedByIdCliente;
                }

                if ($partial && $this->collHbfPrepagossRelatedByIdCliente) {
                    foreach ($this->collHbfPrepagossRelatedByIdCliente as $obj) {
                        if ($obj->isNew()) {
                            $collHbfPrepagossRelatedByIdCliente[] = $obj;
                        }
                    }
                }

                $this->collHbfPrepagossRelatedByIdCliente = $collHbfPrepagossRelatedByIdCliente;
                $this->collHbfPrepagossRelatedByIdClientePartial = false;
            }
        }

        return $this->collHbfPrepagossRelatedByIdCliente;
    }

    /**
     * Sets a collection of ChildHbfPrepagos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfPrepagossRelatedByIdCliente A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfPrepagossRelatedByIdCliente(Collection $hbfPrepagossRelatedByIdCliente, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPrepagos[] $hbfPrepagossRelatedByIdClienteToDelete */
        $hbfPrepagossRelatedByIdClienteToDelete = $this->getHbfPrepagossRelatedByIdCliente(new Criteria(), $con)->diff($hbfPrepagossRelatedByIdCliente);


        $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion = $hbfPrepagossRelatedByIdClienteToDelete;

        foreach ($hbfPrepagossRelatedByIdClienteToDelete as $hbfPrepagosRelatedByIdClienteRemoved) {
            $hbfPrepagosRelatedByIdClienteRemoved->setCiUsuariosRelatedByIdCliente(null);
        }

        $this->collHbfPrepagossRelatedByIdCliente = null;
        foreach ($hbfPrepagossRelatedByIdCliente as $hbfPrepagosRelatedByIdCliente) {
            $this->addHbfPrepagosRelatedByIdCliente($hbfPrepagosRelatedByIdCliente);
        }

        $this->collHbfPrepagossRelatedByIdCliente = $hbfPrepagossRelatedByIdCliente;
        $this->collHbfPrepagossRelatedByIdClientePartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfPrepagos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfPrepagos objects.
     * @throws PropelException
     */
    public function countHbfPrepagossRelatedByIdCliente(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfPrepagossRelatedByIdCliente || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagossRelatedByIdCliente) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfPrepagossRelatedByIdCliente());
            }

            $query = ChildHbfPrepagosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdCliente($this)
                ->count($con);
        }

        return count($this->collHbfPrepagossRelatedByIdCliente);
    }

    /**
     * Method called to associate a ChildHbfPrepagos object to this object
     * through the ChildHbfPrepagos foreign key attribute.
     *
     * @param  ChildHbfPrepagos $l ChildHbfPrepagos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfPrepagosRelatedByIdCliente(ChildHbfPrepagos $l)
    {
        if ($this->collHbfPrepagossRelatedByIdCliente === null) {
            $this->initHbfPrepagossRelatedByIdCliente();
            $this->collHbfPrepagossRelatedByIdClientePartial = true;
        }

        if (!$this->collHbfPrepagossRelatedByIdCliente->contains($l)) {
            $this->doAddHbfPrepagosRelatedByIdCliente($l);

            if ($this->hbfPrepagossRelatedByIdClienteScheduledForDeletion and $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion->contains($l)) {
                $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion->remove($this->hbfPrepagossRelatedByIdClienteScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfPrepagos $hbfPrepagosRelatedByIdCliente The ChildHbfPrepagos object to add.
     */
    protected function doAddHbfPrepagosRelatedByIdCliente(ChildHbfPrepagos $hbfPrepagosRelatedByIdCliente)
    {
        $this->collHbfPrepagossRelatedByIdCliente[]= $hbfPrepagosRelatedByIdCliente;
        $hbfPrepagosRelatedByIdCliente->setCiUsuariosRelatedByIdCliente($this);
    }

    /**
     * @param  ChildHbfPrepagos $hbfPrepagosRelatedByIdCliente The ChildHbfPrepagos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfPrepagosRelatedByIdCliente(ChildHbfPrepagos $hbfPrepagosRelatedByIdCliente)
    {
        if ($this->getHbfPrepagossRelatedByIdCliente()->contains($hbfPrepagosRelatedByIdCliente)) {
            $pos = $this->collHbfPrepagossRelatedByIdCliente->search($hbfPrepagosRelatedByIdCliente);
            $this->collHbfPrepagossRelatedByIdCliente->remove($pos);
            if (null === $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion) {
                $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion = clone $this->collHbfPrepagossRelatedByIdCliente;
                $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion->clear();
            }
            $this->hbfPrepagossRelatedByIdClienteScheduledForDeletion[]= $hbfPrepagosRelatedByIdCliente;
            $hbfPrepagosRelatedByIdCliente->setCiUsuariosRelatedByIdCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdClienteJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdClienteJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdClienteJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdCliente($query, $con);
    }

    /**
     * Clears out the collHbfPrepagossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfPrepagossRelatedByIdUserCreated()
     */
    public function clearHbfPrepagossRelatedByIdUserCreated()
    {
        $this->collHbfPrepagossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfPrepagossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfPrepagossRelatedByIdUserCreated($v = true)
    {
        $this->collHbfPrepagossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfPrepagossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfPrepagossRelatedByIdUserCreated collection to an empty array (like clearcollHbfPrepagossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfPrepagossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfPrepagossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfPrepagosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfPrepagossRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfPrepagossRelatedByIdUserCreated->setModel('\HbfPrepagos');
    }

    /**
     * Gets an array of ChildHbfPrepagos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     * @throws PropelException
     */
    public function getHbfPrepagossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfPrepagossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagossRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfPrepagossRelatedByIdUserCreated();
            } else {
                $collHbfPrepagossRelatedByIdUserCreated = ChildHbfPrepagosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfPrepagossRelatedByIdUserCreatedPartial && count($collHbfPrepagossRelatedByIdUserCreated)) {
                        $this->initHbfPrepagossRelatedByIdUserCreated(false);

                        foreach ($collHbfPrepagossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfPrepagossRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfPrepagossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfPrepagossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfPrepagossRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfPrepagossRelatedByIdUserCreated) {
                    foreach ($this->collHbfPrepagossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfPrepagossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfPrepagossRelatedByIdUserCreated = $collHbfPrepagossRelatedByIdUserCreated;
                $this->collHbfPrepagossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfPrepagossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfPrepagos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfPrepagossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfPrepagossRelatedByIdUserCreated(Collection $hbfPrepagossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPrepagos[] $hbfPrepagossRelatedByIdUserCreatedToDelete */
        $hbfPrepagossRelatedByIdUserCreatedToDelete = $this->getHbfPrepagossRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfPrepagossRelatedByIdUserCreated);


        $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion = $hbfPrepagossRelatedByIdUserCreatedToDelete;

        foreach ($hbfPrepagossRelatedByIdUserCreatedToDelete as $hbfPrepagosRelatedByIdUserCreatedRemoved) {
            $hbfPrepagosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfPrepagossRelatedByIdUserCreated = null;
        foreach ($hbfPrepagossRelatedByIdUserCreated as $hbfPrepagosRelatedByIdUserCreated) {
            $this->addHbfPrepagosRelatedByIdUserCreated($hbfPrepagosRelatedByIdUserCreated);
        }

        $this->collHbfPrepagossRelatedByIdUserCreated = $hbfPrepagossRelatedByIdUserCreated;
        $this->collHbfPrepagossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfPrepagos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfPrepagos objects.
     * @throws PropelException
     */
    public function countHbfPrepagossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfPrepagossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfPrepagossRelatedByIdUserCreated());
            }

            $query = ChildHbfPrepagosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfPrepagossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfPrepagos object to this object
     * through the ChildHbfPrepagos foreign key attribute.
     *
     * @param  ChildHbfPrepagos $l ChildHbfPrepagos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfPrepagosRelatedByIdUserCreated(ChildHbfPrepagos $l)
    {
        if ($this->collHbfPrepagossRelatedByIdUserCreated === null) {
            $this->initHbfPrepagossRelatedByIdUserCreated();
            $this->collHbfPrepagossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfPrepagossRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfPrepagosRelatedByIdUserCreated($l);

            if ($this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion and $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfPrepagos $hbfPrepagosRelatedByIdUserCreated The ChildHbfPrepagos object to add.
     */
    protected function doAddHbfPrepagosRelatedByIdUserCreated(ChildHbfPrepagos $hbfPrepagosRelatedByIdUserCreated)
    {
        $this->collHbfPrepagossRelatedByIdUserCreated[]= $hbfPrepagosRelatedByIdUserCreated;
        $hbfPrepagosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfPrepagos $hbfPrepagosRelatedByIdUserCreated The ChildHbfPrepagos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfPrepagosRelatedByIdUserCreated(ChildHbfPrepagos $hbfPrepagosRelatedByIdUserCreated)
    {
        if ($this->getHbfPrepagossRelatedByIdUserCreated()->contains($hbfPrepagosRelatedByIdUserCreated)) {
            $pos = $this->collHbfPrepagossRelatedByIdUserCreated->search($hbfPrepagosRelatedByIdUserCreated);
            $this->collHbfPrepagossRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfPrepagossRelatedByIdUserCreated;
                $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfPrepagossRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfPrepagosRelatedByIdUserCreated;
            $hbfPrepagosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdUserCreatedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdUserCreatedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdUserCreatedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfPrepagossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfPrepagossRelatedByIdUserModified()
     */
    public function clearHbfPrepagossRelatedByIdUserModified()
    {
        $this->collHbfPrepagossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfPrepagossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfPrepagossRelatedByIdUserModified($v = true)
    {
        $this->collHbfPrepagossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfPrepagossRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfPrepagossRelatedByIdUserModified collection to an empty array (like clearcollHbfPrepagossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfPrepagossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfPrepagossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfPrepagosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfPrepagossRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfPrepagossRelatedByIdUserModified->setModel('\HbfPrepagos');
    }

    /**
     * Gets an array of ChildHbfPrepagos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     * @throws PropelException
     */
    public function getHbfPrepagossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfPrepagossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagossRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfPrepagossRelatedByIdUserModified();
            } else {
                $collHbfPrepagossRelatedByIdUserModified = ChildHbfPrepagosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfPrepagossRelatedByIdUserModifiedPartial && count($collHbfPrepagossRelatedByIdUserModified)) {
                        $this->initHbfPrepagossRelatedByIdUserModified(false);

                        foreach ($collHbfPrepagossRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfPrepagossRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfPrepagossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfPrepagossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfPrepagossRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfPrepagossRelatedByIdUserModified) {
                    foreach ($this->collHbfPrepagossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfPrepagossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfPrepagossRelatedByIdUserModified = $collHbfPrepagossRelatedByIdUserModified;
                $this->collHbfPrepagossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfPrepagossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfPrepagos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfPrepagossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfPrepagossRelatedByIdUserModified(Collection $hbfPrepagossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPrepagos[] $hbfPrepagossRelatedByIdUserModifiedToDelete */
        $hbfPrepagossRelatedByIdUserModifiedToDelete = $this->getHbfPrepagossRelatedByIdUserModified(new Criteria(), $con)->diff($hbfPrepagossRelatedByIdUserModified);


        $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion = $hbfPrepagossRelatedByIdUserModifiedToDelete;

        foreach ($hbfPrepagossRelatedByIdUserModifiedToDelete as $hbfPrepagosRelatedByIdUserModifiedRemoved) {
            $hbfPrepagosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfPrepagossRelatedByIdUserModified = null;
        foreach ($hbfPrepagossRelatedByIdUserModified as $hbfPrepagosRelatedByIdUserModified) {
            $this->addHbfPrepagosRelatedByIdUserModified($hbfPrepagosRelatedByIdUserModified);
        }

        $this->collHbfPrepagossRelatedByIdUserModified = $hbfPrepagossRelatedByIdUserModified;
        $this->collHbfPrepagossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfPrepagos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfPrepagos objects.
     * @throws PropelException
     */
    public function countHbfPrepagossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfPrepagossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfPrepagossRelatedByIdUserModified());
            }

            $query = ChildHbfPrepagosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfPrepagossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfPrepagos object to this object
     * through the ChildHbfPrepagos foreign key attribute.
     *
     * @param  ChildHbfPrepagos $l ChildHbfPrepagos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfPrepagosRelatedByIdUserModified(ChildHbfPrepagos $l)
    {
        if ($this->collHbfPrepagossRelatedByIdUserModified === null) {
            $this->initHbfPrepagossRelatedByIdUserModified();
            $this->collHbfPrepagossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfPrepagossRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfPrepagosRelatedByIdUserModified($l);

            if ($this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion and $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfPrepagos $hbfPrepagosRelatedByIdUserModified The ChildHbfPrepagos object to add.
     */
    protected function doAddHbfPrepagosRelatedByIdUserModified(ChildHbfPrepagos $hbfPrepagosRelatedByIdUserModified)
    {
        $this->collHbfPrepagossRelatedByIdUserModified[]= $hbfPrepagosRelatedByIdUserModified;
        $hbfPrepagosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfPrepagos $hbfPrepagosRelatedByIdUserModified The ChildHbfPrepagos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfPrepagosRelatedByIdUserModified(ChildHbfPrepagos $hbfPrepagosRelatedByIdUserModified)
    {
        if ($this->getHbfPrepagossRelatedByIdUserModified()->contains($hbfPrepagosRelatedByIdUserModified)) {
            $pos = $this->collHbfPrepagossRelatedByIdUserModified->search($hbfPrepagosRelatedByIdUserModified);
            $this->collHbfPrepagossRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfPrepagossRelatedByIdUserModified;
                $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfPrepagossRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfPrepagosRelatedByIdUserModified;
            $hbfPrepagosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdUserModifiedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdUserModifiedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfPrepagossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossRelatedByIdUserModifiedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfPrepagossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfProductossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfProductossRelatedByIdUserCreated()
     */
    public function clearHbfProductossRelatedByIdUserCreated()
    {
        $this->collHbfProductossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfProductossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfProductossRelatedByIdUserCreated($v = true)
    {
        $this->collHbfProductossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfProductossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfProductossRelatedByIdUserCreated collection to an empty array (like clearcollHbfProductossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfProductossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfProductossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfProductosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfProductossRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfProductossRelatedByIdUserCreated->setModel('\HbfProductos');
    }

    /**
     * Gets an array of ChildHbfProductos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     * @throws PropelException
     */
    public function getHbfProductossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfProductossRelatedByIdUserCreated();
            } else {
                $collHbfProductossRelatedByIdUserCreated = ChildHbfProductosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfProductossRelatedByIdUserCreatedPartial && count($collHbfProductossRelatedByIdUserCreated)) {
                        $this->initHbfProductossRelatedByIdUserCreated(false);

                        foreach ($collHbfProductossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfProductossRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfProductossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfProductossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfProductossRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfProductossRelatedByIdUserCreated) {
                    foreach ($this->collHbfProductossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfProductossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfProductossRelatedByIdUserCreated = $collHbfProductossRelatedByIdUserCreated;
                $this->collHbfProductossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfProductossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfProductos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfProductossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfProductossRelatedByIdUserCreated(Collection $hbfProductossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfProductos[] $hbfProductossRelatedByIdUserCreatedToDelete */
        $hbfProductossRelatedByIdUserCreatedToDelete = $this->getHbfProductossRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfProductossRelatedByIdUserCreated);


        $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion = $hbfProductossRelatedByIdUserCreatedToDelete;

        foreach ($hbfProductossRelatedByIdUserCreatedToDelete as $hbfProductosRelatedByIdUserCreatedRemoved) {
            $hbfProductosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfProductossRelatedByIdUserCreated = null;
        foreach ($hbfProductossRelatedByIdUserCreated as $hbfProductosRelatedByIdUserCreated) {
            $this->addHbfProductosRelatedByIdUserCreated($hbfProductosRelatedByIdUserCreated);
        }

        $this->collHbfProductossRelatedByIdUserCreated = $hbfProductossRelatedByIdUserCreated;
        $this->collHbfProductossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfProductos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfProductos objects.
     * @throws PropelException
     */
    public function countHbfProductossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfProductossRelatedByIdUserCreated());
            }

            $query = ChildHbfProductosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfProductossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfProductos object to this object
     * through the ChildHbfProductos foreign key attribute.
     *
     * @param  ChildHbfProductos $l ChildHbfProductos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfProductosRelatedByIdUserCreated(ChildHbfProductos $l)
    {
        if ($this->collHbfProductossRelatedByIdUserCreated === null) {
            $this->initHbfProductossRelatedByIdUserCreated();
            $this->collHbfProductossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfProductossRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfProductosRelatedByIdUserCreated($l);

            if ($this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion and $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfProductos $hbfProductosRelatedByIdUserCreated The ChildHbfProductos object to add.
     */
    protected function doAddHbfProductosRelatedByIdUserCreated(ChildHbfProductos $hbfProductosRelatedByIdUserCreated)
    {
        $this->collHbfProductossRelatedByIdUserCreated[]= $hbfProductosRelatedByIdUserCreated;
        $hbfProductosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfProductos $hbfProductosRelatedByIdUserCreated The ChildHbfProductos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfProductosRelatedByIdUserCreated(ChildHbfProductos $hbfProductosRelatedByIdUserCreated)
    {
        if ($this->getHbfProductossRelatedByIdUserCreated()->contains($hbfProductosRelatedByIdUserCreated)) {
            $pos = $this->collHbfProductossRelatedByIdUserCreated->search($hbfProductosRelatedByIdUserCreated);
            $this->collHbfProductossRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfProductossRelatedByIdUserCreated;
                $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfProductossRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfProductosRelatedByIdUserCreated;
            $hbfProductosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdUserCreatedJoinCiOptionsRelatedByIdOptionCategoriaProducto(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionCategoriaProducto', $joinBehavior);

        return $this->getHbfProductossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdUserCreatedJoinCiOptionsRelatedByIdOptionTipoProducto(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionTipoProducto', $joinBehavior);

        return $this->getHbfProductossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfProductossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfProductossRelatedByIdUserModified()
     */
    public function clearHbfProductossRelatedByIdUserModified()
    {
        $this->collHbfProductossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfProductossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfProductossRelatedByIdUserModified($v = true)
    {
        $this->collHbfProductossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfProductossRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfProductossRelatedByIdUserModified collection to an empty array (like clearcollHbfProductossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfProductossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfProductossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfProductosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfProductossRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfProductossRelatedByIdUserModified->setModel('\HbfProductos');
    }

    /**
     * Gets an array of ChildHbfProductos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     * @throws PropelException
     */
    public function getHbfProductossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfProductossRelatedByIdUserModified();
            } else {
                $collHbfProductossRelatedByIdUserModified = ChildHbfProductosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfProductossRelatedByIdUserModifiedPartial && count($collHbfProductossRelatedByIdUserModified)) {
                        $this->initHbfProductossRelatedByIdUserModified(false);

                        foreach ($collHbfProductossRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfProductossRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfProductossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfProductossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfProductossRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfProductossRelatedByIdUserModified) {
                    foreach ($this->collHbfProductossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfProductossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfProductossRelatedByIdUserModified = $collHbfProductossRelatedByIdUserModified;
                $this->collHbfProductossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfProductossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfProductos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfProductossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfProductossRelatedByIdUserModified(Collection $hbfProductossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfProductos[] $hbfProductossRelatedByIdUserModifiedToDelete */
        $hbfProductossRelatedByIdUserModifiedToDelete = $this->getHbfProductossRelatedByIdUserModified(new Criteria(), $con)->diff($hbfProductossRelatedByIdUserModified);


        $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion = $hbfProductossRelatedByIdUserModifiedToDelete;

        foreach ($hbfProductossRelatedByIdUserModifiedToDelete as $hbfProductosRelatedByIdUserModifiedRemoved) {
            $hbfProductosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfProductossRelatedByIdUserModified = null;
        foreach ($hbfProductossRelatedByIdUserModified as $hbfProductosRelatedByIdUserModified) {
            $this->addHbfProductosRelatedByIdUserModified($hbfProductosRelatedByIdUserModified);
        }

        $this->collHbfProductossRelatedByIdUserModified = $hbfProductossRelatedByIdUserModified;
        $this->collHbfProductossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfProductos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfProductos objects.
     * @throws PropelException
     */
    public function countHbfProductossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfProductossRelatedByIdUserModified());
            }

            $query = ChildHbfProductosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfProductossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfProductos object to this object
     * through the ChildHbfProductos foreign key attribute.
     *
     * @param  ChildHbfProductos $l ChildHbfProductos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfProductosRelatedByIdUserModified(ChildHbfProductos $l)
    {
        if ($this->collHbfProductossRelatedByIdUserModified === null) {
            $this->initHbfProductossRelatedByIdUserModified();
            $this->collHbfProductossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfProductossRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfProductosRelatedByIdUserModified($l);

            if ($this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion and $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfProductos $hbfProductosRelatedByIdUserModified The ChildHbfProductos object to add.
     */
    protected function doAddHbfProductosRelatedByIdUserModified(ChildHbfProductos $hbfProductosRelatedByIdUserModified)
    {
        $this->collHbfProductossRelatedByIdUserModified[]= $hbfProductosRelatedByIdUserModified;
        $hbfProductosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfProductos $hbfProductosRelatedByIdUserModified The ChildHbfProductos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfProductosRelatedByIdUserModified(ChildHbfProductos $hbfProductosRelatedByIdUserModified)
    {
        if ($this->getHbfProductossRelatedByIdUserModified()->contains($hbfProductosRelatedByIdUserModified)) {
            $pos = $this->collHbfProductossRelatedByIdUserModified->search($hbfProductosRelatedByIdUserModified);
            $this->collHbfProductossRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfProductossRelatedByIdUserModified;
                $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfProductossRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfProductosRelatedByIdUserModified;
            $hbfProductosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdUserModifiedJoinCiOptionsRelatedByIdOptionCategoriaProducto(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionCategoriaProducto', $joinBehavior);

        return $this->getHbfProductossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdUserModifiedJoinCiOptionsRelatedByIdOptionTipoProducto(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionTipoProducto', $joinBehavior);

        return $this->getHbfProductossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfSesionessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfSesionessRelatedByIdUserCreated()
     */
    public function clearHbfSesionessRelatedByIdUserCreated()
    {
        $this->collHbfSesionessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfSesionessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfSesionessRelatedByIdUserCreated($v = true)
    {
        $this->collHbfSesionessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfSesionessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfSesionessRelatedByIdUserCreated collection to an empty array (like clearcollHbfSesionessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfSesionessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfSesionessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfSesionesTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfSesionessRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfSesionessRelatedByIdUserCreated->setModel('\HbfSesiones');
    }

    /**
     * Gets an array of ChildHbfSesiones objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     * @throws PropelException
     */
    public function getHbfSesionessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfSesionessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfSesionessRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfSesionessRelatedByIdUserCreated();
            } else {
                $collHbfSesionessRelatedByIdUserCreated = ChildHbfSesionesQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfSesionessRelatedByIdUserCreatedPartial && count($collHbfSesionessRelatedByIdUserCreated)) {
                        $this->initHbfSesionessRelatedByIdUserCreated(false);

                        foreach ($collHbfSesionessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfSesionessRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfSesionessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfSesionessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfSesionessRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfSesionessRelatedByIdUserCreated) {
                    foreach ($this->collHbfSesionessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfSesionessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfSesionessRelatedByIdUserCreated = $collHbfSesionessRelatedByIdUserCreated;
                $this->collHbfSesionessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfSesionessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfSesiones objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfSesionessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfSesionessRelatedByIdUserCreated(Collection $hbfSesionessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfSesiones[] $hbfSesionessRelatedByIdUserCreatedToDelete */
        $hbfSesionessRelatedByIdUserCreatedToDelete = $this->getHbfSesionessRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfSesionessRelatedByIdUserCreated);


        $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion = $hbfSesionessRelatedByIdUserCreatedToDelete;

        foreach ($hbfSesionessRelatedByIdUserCreatedToDelete as $hbfSesionesRelatedByIdUserCreatedRemoved) {
            $hbfSesionesRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfSesionessRelatedByIdUserCreated = null;
        foreach ($hbfSesionessRelatedByIdUserCreated as $hbfSesionesRelatedByIdUserCreated) {
            $this->addHbfSesionesRelatedByIdUserCreated($hbfSesionesRelatedByIdUserCreated);
        }

        $this->collHbfSesionessRelatedByIdUserCreated = $hbfSesionessRelatedByIdUserCreated;
        $this->collHbfSesionessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfSesiones objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfSesiones objects.
     * @throws PropelException
     */
    public function countHbfSesionessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfSesionessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfSesionessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfSesionessRelatedByIdUserCreated());
            }

            $query = ChildHbfSesionesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfSesionessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfSesiones object to this object
     * through the ChildHbfSesiones foreign key attribute.
     *
     * @param  ChildHbfSesiones $l ChildHbfSesiones
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfSesionesRelatedByIdUserCreated(ChildHbfSesiones $l)
    {
        if ($this->collHbfSesionessRelatedByIdUserCreated === null) {
            $this->initHbfSesionessRelatedByIdUserCreated();
            $this->collHbfSesionessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfSesionessRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfSesionesRelatedByIdUserCreated($l);

            if ($this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion and $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfSesiones $hbfSesionesRelatedByIdUserCreated The ChildHbfSesiones object to add.
     */
    protected function doAddHbfSesionesRelatedByIdUserCreated(ChildHbfSesiones $hbfSesionesRelatedByIdUserCreated)
    {
        $this->collHbfSesionessRelatedByIdUserCreated[]= $hbfSesionesRelatedByIdUserCreated;
        $hbfSesionesRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfSesiones $hbfSesionesRelatedByIdUserCreated The ChildHbfSesiones object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfSesionesRelatedByIdUserCreated(ChildHbfSesiones $hbfSesionesRelatedByIdUserCreated)
    {
        if ($this->getHbfSesionessRelatedByIdUserCreated()->contains($hbfSesionesRelatedByIdUserCreated)) {
            $pos = $this->collHbfSesionessRelatedByIdUserCreated->search($hbfSesionesRelatedByIdUserCreated);
            $this->collHbfSesionessRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfSesionessRelatedByIdUserCreated;
                $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfSesionessRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfSesionesRelatedByIdUserCreated;
            $hbfSesionesRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdUserCreatedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdUserCreatedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdUserCreatedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfSesionessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfSesionessRelatedByIdUserModified()
     */
    public function clearHbfSesionessRelatedByIdUserModified()
    {
        $this->collHbfSesionessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfSesionessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfSesionessRelatedByIdUserModified($v = true)
    {
        $this->collHbfSesionessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfSesionessRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfSesionessRelatedByIdUserModified collection to an empty array (like clearcollHbfSesionessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfSesionessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfSesionessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfSesionesTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfSesionessRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfSesionessRelatedByIdUserModified->setModel('\HbfSesiones');
    }

    /**
     * Gets an array of ChildHbfSesiones objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     * @throws PropelException
     */
    public function getHbfSesionessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfSesionessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfSesionessRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfSesionessRelatedByIdUserModified();
            } else {
                $collHbfSesionessRelatedByIdUserModified = ChildHbfSesionesQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfSesionessRelatedByIdUserModifiedPartial && count($collHbfSesionessRelatedByIdUserModified)) {
                        $this->initHbfSesionessRelatedByIdUserModified(false);

                        foreach ($collHbfSesionessRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfSesionessRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfSesionessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfSesionessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfSesionessRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfSesionessRelatedByIdUserModified) {
                    foreach ($this->collHbfSesionessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfSesionessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfSesionessRelatedByIdUserModified = $collHbfSesionessRelatedByIdUserModified;
                $this->collHbfSesionessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfSesionessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfSesiones objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfSesionessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfSesionessRelatedByIdUserModified(Collection $hbfSesionessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfSesiones[] $hbfSesionessRelatedByIdUserModifiedToDelete */
        $hbfSesionessRelatedByIdUserModifiedToDelete = $this->getHbfSesionessRelatedByIdUserModified(new Criteria(), $con)->diff($hbfSesionessRelatedByIdUserModified);


        $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion = $hbfSesionessRelatedByIdUserModifiedToDelete;

        foreach ($hbfSesionessRelatedByIdUserModifiedToDelete as $hbfSesionesRelatedByIdUserModifiedRemoved) {
            $hbfSesionesRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfSesionessRelatedByIdUserModified = null;
        foreach ($hbfSesionessRelatedByIdUserModified as $hbfSesionesRelatedByIdUserModified) {
            $this->addHbfSesionesRelatedByIdUserModified($hbfSesionesRelatedByIdUserModified);
        }

        $this->collHbfSesionessRelatedByIdUserModified = $hbfSesionessRelatedByIdUserModified;
        $this->collHbfSesionessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfSesiones objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfSesiones objects.
     * @throws PropelException
     */
    public function countHbfSesionessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfSesionessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfSesionessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfSesionessRelatedByIdUserModified());
            }

            $query = ChildHbfSesionesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfSesionessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfSesiones object to this object
     * through the ChildHbfSesiones foreign key attribute.
     *
     * @param  ChildHbfSesiones $l ChildHbfSesiones
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfSesionesRelatedByIdUserModified(ChildHbfSesiones $l)
    {
        if ($this->collHbfSesionessRelatedByIdUserModified === null) {
            $this->initHbfSesionessRelatedByIdUserModified();
            $this->collHbfSesionessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfSesionessRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfSesionesRelatedByIdUserModified($l);

            if ($this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion and $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfSesiones $hbfSesionesRelatedByIdUserModified The ChildHbfSesiones object to add.
     */
    protected function doAddHbfSesionesRelatedByIdUserModified(ChildHbfSesiones $hbfSesionesRelatedByIdUserModified)
    {
        $this->collHbfSesionessRelatedByIdUserModified[]= $hbfSesionesRelatedByIdUserModified;
        $hbfSesionesRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfSesiones $hbfSesionesRelatedByIdUserModified The ChildHbfSesiones object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfSesionesRelatedByIdUserModified(ChildHbfSesiones $hbfSesionesRelatedByIdUserModified)
    {
        if ($this->getHbfSesionessRelatedByIdUserModified()->contains($hbfSesionesRelatedByIdUserModified)) {
            $pos = $this->collHbfSesionessRelatedByIdUserModified->search($hbfSesionesRelatedByIdUserModified);
            $this->collHbfSesionessRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfSesionessRelatedByIdUserModified;
                $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfSesionessRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfSesionesRelatedByIdUserModified;
            $hbfSesionesRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdUserModifiedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdUserModifiedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdUserModifiedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfSesionessRelatedByIdAsociado collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfSesionessRelatedByIdAsociado()
     */
    public function clearHbfSesionessRelatedByIdAsociado()
    {
        $this->collHbfSesionessRelatedByIdAsociado = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfSesionessRelatedByIdAsociado collection loaded partially.
     */
    public function resetPartialHbfSesionessRelatedByIdAsociado($v = true)
    {
        $this->collHbfSesionessRelatedByIdAsociadoPartial = $v;
    }

    /**
     * Initializes the collHbfSesionessRelatedByIdAsociado collection.
     *
     * By default this just sets the collHbfSesionessRelatedByIdAsociado collection to an empty array (like clearcollHbfSesionessRelatedByIdAsociado());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfSesionessRelatedByIdAsociado($overrideExisting = true)
    {
        if (null !== $this->collHbfSesionessRelatedByIdAsociado && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfSesionesTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfSesionessRelatedByIdAsociado = new $collectionClassName;
        $this->collHbfSesionessRelatedByIdAsociado->setModel('\HbfSesiones');
    }

    /**
     * Gets an array of ChildHbfSesiones objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     * @throws PropelException
     */
    public function getHbfSesionessRelatedByIdAsociado(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessRelatedByIdAsociadoPartial && !$this->isNew();
        if (null === $this->collHbfSesionessRelatedByIdAsociado || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfSesionessRelatedByIdAsociado) {
                // return empty collection
                $this->initHbfSesionessRelatedByIdAsociado();
            } else {
                $collHbfSesionessRelatedByIdAsociado = ChildHbfSesionesQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdAsociado($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfSesionessRelatedByIdAsociadoPartial && count($collHbfSesionessRelatedByIdAsociado)) {
                        $this->initHbfSesionessRelatedByIdAsociado(false);

                        foreach ($collHbfSesionessRelatedByIdAsociado as $obj) {
                            if (false == $this->collHbfSesionessRelatedByIdAsociado->contains($obj)) {
                                $this->collHbfSesionessRelatedByIdAsociado->append($obj);
                            }
                        }

                        $this->collHbfSesionessRelatedByIdAsociadoPartial = true;
                    }

                    return $collHbfSesionessRelatedByIdAsociado;
                }

                if ($partial && $this->collHbfSesionessRelatedByIdAsociado) {
                    foreach ($this->collHbfSesionessRelatedByIdAsociado as $obj) {
                        if ($obj->isNew()) {
                            $collHbfSesionessRelatedByIdAsociado[] = $obj;
                        }
                    }
                }

                $this->collHbfSesionessRelatedByIdAsociado = $collHbfSesionessRelatedByIdAsociado;
                $this->collHbfSesionessRelatedByIdAsociadoPartial = false;
            }
        }

        return $this->collHbfSesionessRelatedByIdAsociado;
    }

    /**
     * Sets a collection of ChildHbfSesiones objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfSesionessRelatedByIdAsociado A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfSesionessRelatedByIdAsociado(Collection $hbfSesionessRelatedByIdAsociado, ConnectionInterface $con = null)
    {
        /** @var ChildHbfSesiones[] $hbfSesionessRelatedByIdAsociadoToDelete */
        $hbfSesionessRelatedByIdAsociadoToDelete = $this->getHbfSesionessRelatedByIdAsociado(new Criteria(), $con)->diff($hbfSesionessRelatedByIdAsociado);


        $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion = $hbfSesionessRelatedByIdAsociadoToDelete;

        foreach ($hbfSesionessRelatedByIdAsociadoToDelete as $hbfSesionesRelatedByIdAsociadoRemoved) {
            $hbfSesionesRelatedByIdAsociadoRemoved->setCiUsuariosRelatedByIdAsociado(null);
        }

        $this->collHbfSesionessRelatedByIdAsociado = null;
        foreach ($hbfSesionessRelatedByIdAsociado as $hbfSesionesRelatedByIdAsociado) {
            $this->addHbfSesionesRelatedByIdAsociado($hbfSesionesRelatedByIdAsociado);
        }

        $this->collHbfSesionessRelatedByIdAsociado = $hbfSesionessRelatedByIdAsociado;
        $this->collHbfSesionessRelatedByIdAsociadoPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfSesiones objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfSesiones objects.
     * @throws PropelException
     */
    public function countHbfSesionessRelatedByIdAsociado(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessRelatedByIdAsociadoPartial && !$this->isNew();
        if (null === $this->collHbfSesionessRelatedByIdAsociado || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfSesionessRelatedByIdAsociado) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfSesionessRelatedByIdAsociado());
            }

            $query = ChildHbfSesionesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdAsociado($this)
                ->count($con);
        }

        return count($this->collHbfSesionessRelatedByIdAsociado);
    }

    /**
     * Method called to associate a ChildHbfSesiones object to this object
     * through the ChildHbfSesiones foreign key attribute.
     *
     * @param  ChildHbfSesiones $l ChildHbfSesiones
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfSesionesRelatedByIdAsociado(ChildHbfSesiones $l)
    {
        if ($this->collHbfSesionessRelatedByIdAsociado === null) {
            $this->initHbfSesionessRelatedByIdAsociado();
            $this->collHbfSesionessRelatedByIdAsociadoPartial = true;
        }

        if (!$this->collHbfSesionessRelatedByIdAsociado->contains($l)) {
            $this->doAddHbfSesionesRelatedByIdAsociado($l);

            if ($this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion and $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion->contains($l)) {
                $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion->remove($this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfSesiones $hbfSesionesRelatedByIdAsociado The ChildHbfSesiones object to add.
     */
    protected function doAddHbfSesionesRelatedByIdAsociado(ChildHbfSesiones $hbfSesionesRelatedByIdAsociado)
    {
        $this->collHbfSesionessRelatedByIdAsociado[]= $hbfSesionesRelatedByIdAsociado;
        $hbfSesionesRelatedByIdAsociado->setCiUsuariosRelatedByIdAsociado($this);
    }

    /**
     * @param  ChildHbfSesiones $hbfSesionesRelatedByIdAsociado The ChildHbfSesiones object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfSesionesRelatedByIdAsociado(ChildHbfSesiones $hbfSesionesRelatedByIdAsociado)
    {
        if ($this->getHbfSesionessRelatedByIdAsociado()->contains($hbfSesionesRelatedByIdAsociado)) {
            $pos = $this->collHbfSesionessRelatedByIdAsociado->search($hbfSesionesRelatedByIdAsociado);
            $this->collHbfSesionessRelatedByIdAsociado->remove($pos);
            if (null === $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion) {
                $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion = clone $this->collHbfSesionessRelatedByIdAsociado;
                $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion->clear();
            }
            $this->hbfSesionessRelatedByIdAsociadoScheduledForDeletion[]= clone $hbfSesionesRelatedByIdAsociado;
            $hbfSesionesRelatedByIdAsociado->setCiUsuariosRelatedByIdAsociado(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdAsociadoJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdAsociado($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdAsociadoJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdAsociado($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfSesionessRelatedByIdAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessRelatedByIdAsociadoJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfSesionessRelatedByIdAsociado($query, $con);
    }

    /**
     * Clears out the collHbfTurnossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfTurnossRelatedByIdUserCreated()
     */
    public function clearHbfTurnossRelatedByIdUserCreated()
    {
        $this->collHbfTurnossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfTurnossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfTurnossRelatedByIdUserCreated($v = true)
    {
        $this->collHbfTurnossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfTurnossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfTurnossRelatedByIdUserCreated collection to an empty array (like clearcollHbfTurnossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfTurnossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfTurnossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfTurnosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfTurnossRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfTurnossRelatedByIdUserCreated->setModel('\HbfTurnos');
    }

    /**
     * Gets an array of ChildHbfTurnos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     * @throws PropelException
     */
    public function getHbfTurnossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfTurnossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnossRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfTurnossRelatedByIdUserCreated();
            } else {
                $collHbfTurnossRelatedByIdUserCreated = ChildHbfTurnosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfTurnossRelatedByIdUserCreatedPartial && count($collHbfTurnossRelatedByIdUserCreated)) {
                        $this->initHbfTurnossRelatedByIdUserCreated(false);

                        foreach ($collHbfTurnossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfTurnossRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfTurnossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfTurnossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfTurnossRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfTurnossRelatedByIdUserCreated) {
                    foreach ($this->collHbfTurnossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfTurnossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfTurnossRelatedByIdUserCreated = $collHbfTurnossRelatedByIdUserCreated;
                $this->collHbfTurnossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfTurnossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfTurnos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfTurnossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfTurnossRelatedByIdUserCreated(Collection $hbfTurnossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfTurnos[] $hbfTurnossRelatedByIdUserCreatedToDelete */
        $hbfTurnossRelatedByIdUserCreatedToDelete = $this->getHbfTurnossRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfTurnossRelatedByIdUserCreated);


        $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion = $hbfTurnossRelatedByIdUserCreatedToDelete;

        foreach ($hbfTurnossRelatedByIdUserCreatedToDelete as $hbfTurnosRelatedByIdUserCreatedRemoved) {
            $hbfTurnosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfTurnossRelatedByIdUserCreated = null;
        foreach ($hbfTurnossRelatedByIdUserCreated as $hbfTurnosRelatedByIdUserCreated) {
            $this->addHbfTurnosRelatedByIdUserCreated($hbfTurnosRelatedByIdUserCreated);
        }

        $this->collHbfTurnossRelatedByIdUserCreated = $hbfTurnossRelatedByIdUserCreated;
        $this->collHbfTurnossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfTurnos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfTurnos objects.
     * @throws PropelException
     */
    public function countHbfTurnossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfTurnossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfTurnossRelatedByIdUserCreated());
            }

            $query = ChildHbfTurnosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfTurnossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfTurnos object to this object
     * through the ChildHbfTurnos foreign key attribute.
     *
     * @param  ChildHbfTurnos $l ChildHbfTurnos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfTurnosRelatedByIdUserCreated(ChildHbfTurnos $l)
    {
        if ($this->collHbfTurnossRelatedByIdUserCreated === null) {
            $this->initHbfTurnossRelatedByIdUserCreated();
            $this->collHbfTurnossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfTurnossRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfTurnosRelatedByIdUserCreated($l);

            if ($this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion and $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfTurnos $hbfTurnosRelatedByIdUserCreated The ChildHbfTurnos object to add.
     */
    protected function doAddHbfTurnosRelatedByIdUserCreated(ChildHbfTurnos $hbfTurnosRelatedByIdUserCreated)
    {
        $this->collHbfTurnossRelatedByIdUserCreated[]= $hbfTurnosRelatedByIdUserCreated;
        $hbfTurnosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfTurnos $hbfTurnosRelatedByIdUserCreated The ChildHbfTurnos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfTurnosRelatedByIdUserCreated(ChildHbfTurnos $hbfTurnosRelatedByIdUserCreated)
    {
        if ($this->getHbfTurnossRelatedByIdUserCreated()->contains($hbfTurnosRelatedByIdUserCreated)) {
            $pos = $this->collHbfTurnossRelatedByIdUserCreated->search($hbfTurnosRelatedByIdUserCreated);
            $this->collHbfTurnossRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfTurnossRelatedByIdUserCreated;
                $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfTurnossRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfTurnosRelatedByIdUserCreated;
            $hbfTurnosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfTurnossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossRelatedByIdUserCreatedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfTurnossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfTurnossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossRelatedByIdUserCreatedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfTurnossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfTurnossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfTurnossRelatedByIdUserModified()
     */
    public function clearHbfTurnossRelatedByIdUserModified()
    {
        $this->collHbfTurnossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfTurnossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfTurnossRelatedByIdUserModified($v = true)
    {
        $this->collHbfTurnossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfTurnossRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfTurnossRelatedByIdUserModified collection to an empty array (like clearcollHbfTurnossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfTurnossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfTurnossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfTurnosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfTurnossRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfTurnossRelatedByIdUserModified->setModel('\HbfTurnos');
    }

    /**
     * Gets an array of ChildHbfTurnos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     * @throws PropelException
     */
    public function getHbfTurnossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfTurnossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnossRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfTurnossRelatedByIdUserModified();
            } else {
                $collHbfTurnossRelatedByIdUserModified = ChildHbfTurnosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfTurnossRelatedByIdUserModifiedPartial && count($collHbfTurnossRelatedByIdUserModified)) {
                        $this->initHbfTurnossRelatedByIdUserModified(false);

                        foreach ($collHbfTurnossRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfTurnossRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfTurnossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfTurnossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfTurnossRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfTurnossRelatedByIdUserModified) {
                    foreach ($this->collHbfTurnossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfTurnossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfTurnossRelatedByIdUserModified = $collHbfTurnossRelatedByIdUserModified;
                $this->collHbfTurnossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfTurnossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfTurnos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfTurnossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfTurnossRelatedByIdUserModified(Collection $hbfTurnossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfTurnos[] $hbfTurnossRelatedByIdUserModifiedToDelete */
        $hbfTurnossRelatedByIdUserModifiedToDelete = $this->getHbfTurnossRelatedByIdUserModified(new Criteria(), $con)->diff($hbfTurnossRelatedByIdUserModified);


        $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion = $hbfTurnossRelatedByIdUserModifiedToDelete;

        foreach ($hbfTurnossRelatedByIdUserModifiedToDelete as $hbfTurnosRelatedByIdUserModifiedRemoved) {
            $hbfTurnosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfTurnossRelatedByIdUserModified = null;
        foreach ($hbfTurnossRelatedByIdUserModified as $hbfTurnosRelatedByIdUserModified) {
            $this->addHbfTurnosRelatedByIdUserModified($hbfTurnosRelatedByIdUserModified);
        }

        $this->collHbfTurnossRelatedByIdUserModified = $hbfTurnossRelatedByIdUserModified;
        $this->collHbfTurnossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfTurnos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfTurnos objects.
     * @throws PropelException
     */
    public function countHbfTurnossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfTurnossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfTurnossRelatedByIdUserModified());
            }

            $query = ChildHbfTurnosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfTurnossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfTurnos object to this object
     * through the ChildHbfTurnos foreign key attribute.
     *
     * @param  ChildHbfTurnos $l ChildHbfTurnos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfTurnosRelatedByIdUserModified(ChildHbfTurnos $l)
    {
        if ($this->collHbfTurnossRelatedByIdUserModified === null) {
            $this->initHbfTurnossRelatedByIdUserModified();
            $this->collHbfTurnossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfTurnossRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfTurnosRelatedByIdUserModified($l);

            if ($this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion and $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfTurnos $hbfTurnosRelatedByIdUserModified The ChildHbfTurnos object to add.
     */
    protected function doAddHbfTurnosRelatedByIdUserModified(ChildHbfTurnos $hbfTurnosRelatedByIdUserModified)
    {
        $this->collHbfTurnossRelatedByIdUserModified[]= $hbfTurnosRelatedByIdUserModified;
        $hbfTurnosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfTurnos $hbfTurnosRelatedByIdUserModified The ChildHbfTurnos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfTurnosRelatedByIdUserModified(ChildHbfTurnos $hbfTurnosRelatedByIdUserModified)
    {
        if ($this->getHbfTurnossRelatedByIdUserModified()->contains($hbfTurnosRelatedByIdUserModified)) {
            $pos = $this->collHbfTurnossRelatedByIdUserModified->search($hbfTurnosRelatedByIdUserModified);
            $this->collHbfTurnossRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfTurnossRelatedByIdUserModified;
                $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfTurnossRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfTurnosRelatedByIdUserModified;
            $hbfTurnosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfTurnossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossRelatedByIdUserModifiedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfTurnossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfTurnossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossRelatedByIdUserModifiedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfTurnossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfTurnossRelatedByIdAsociado collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfTurnossRelatedByIdAsociado()
     */
    public function clearHbfTurnossRelatedByIdAsociado()
    {
        $this->collHbfTurnossRelatedByIdAsociado = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfTurnossRelatedByIdAsociado collection loaded partially.
     */
    public function resetPartialHbfTurnossRelatedByIdAsociado($v = true)
    {
        $this->collHbfTurnossRelatedByIdAsociadoPartial = $v;
    }

    /**
     * Initializes the collHbfTurnossRelatedByIdAsociado collection.
     *
     * By default this just sets the collHbfTurnossRelatedByIdAsociado collection to an empty array (like clearcollHbfTurnossRelatedByIdAsociado());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfTurnossRelatedByIdAsociado($overrideExisting = true)
    {
        if (null !== $this->collHbfTurnossRelatedByIdAsociado && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfTurnosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfTurnossRelatedByIdAsociado = new $collectionClassName;
        $this->collHbfTurnossRelatedByIdAsociado->setModel('\HbfTurnos');
    }

    /**
     * Gets an array of ChildHbfTurnos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     * @throws PropelException
     */
    public function getHbfTurnossRelatedByIdAsociado(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossRelatedByIdAsociadoPartial && !$this->isNew();
        if (null === $this->collHbfTurnossRelatedByIdAsociado || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnossRelatedByIdAsociado) {
                // return empty collection
                $this->initHbfTurnossRelatedByIdAsociado();
            } else {
                $collHbfTurnossRelatedByIdAsociado = ChildHbfTurnosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdAsociado($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfTurnossRelatedByIdAsociadoPartial && count($collHbfTurnossRelatedByIdAsociado)) {
                        $this->initHbfTurnossRelatedByIdAsociado(false);

                        foreach ($collHbfTurnossRelatedByIdAsociado as $obj) {
                            if (false == $this->collHbfTurnossRelatedByIdAsociado->contains($obj)) {
                                $this->collHbfTurnossRelatedByIdAsociado->append($obj);
                            }
                        }

                        $this->collHbfTurnossRelatedByIdAsociadoPartial = true;
                    }

                    return $collHbfTurnossRelatedByIdAsociado;
                }

                if ($partial && $this->collHbfTurnossRelatedByIdAsociado) {
                    foreach ($this->collHbfTurnossRelatedByIdAsociado as $obj) {
                        if ($obj->isNew()) {
                            $collHbfTurnossRelatedByIdAsociado[] = $obj;
                        }
                    }
                }

                $this->collHbfTurnossRelatedByIdAsociado = $collHbfTurnossRelatedByIdAsociado;
                $this->collHbfTurnossRelatedByIdAsociadoPartial = false;
            }
        }

        return $this->collHbfTurnossRelatedByIdAsociado;
    }

    /**
     * Sets a collection of ChildHbfTurnos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfTurnossRelatedByIdAsociado A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfTurnossRelatedByIdAsociado(Collection $hbfTurnossRelatedByIdAsociado, ConnectionInterface $con = null)
    {
        /** @var ChildHbfTurnos[] $hbfTurnossRelatedByIdAsociadoToDelete */
        $hbfTurnossRelatedByIdAsociadoToDelete = $this->getHbfTurnossRelatedByIdAsociado(new Criteria(), $con)->diff($hbfTurnossRelatedByIdAsociado);


        $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion = $hbfTurnossRelatedByIdAsociadoToDelete;

        foreach ($hbfTurnossRelatedByIdAsociadoToDelete as $hbfTurnosRelatedByIdAsociadoRemoved) {
            $hbfTurnosRelatedByIdAsociadoRemoved->setCiUsuariosRelatedByIdAsociado(null);
        }

        $this->collHbfTurnossRelatedByIdAsociado = null;
        foreach ($hbfTurnossRelatedByIdAsociado as $hbfTurnosRelatedByIdAsociado) {
            $this->addHbfTurnosRelatedByIdAsociado($hbfTurnosRelatedByIdAsociado);
        }

        $this->collHbfTurnossRelatedByIdAsociado = $hbfTurnossRelatedByIdAsociado;
        $this->collHbfTurnossRelatedByIdAsociadoPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfTurnos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfTurnos objects.
     * @throws PropelException
     */
    public function countHbfTurnossRelatedByIdAsociado(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossRelatedByIdAsociadoPartial && !$this->isNew();
        if (null === $this->collHbfTurnossRelatedByIdAsociado || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnossRelatedByIdAsociado) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfTurnossRelatedByIdAsociado());
            }

            $query = ChildHbfTurnosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdAsociado($this)
                ->count($con);
        }

        return count($this->collHbfTurnossRelatedByIdAsociado);
    }

    /**
     * Method called to associate a ChildHbfTurnos object to this object
     * through the ChildHbfTurnos foreign key attribute.
     *
     * @param  ChildHbfTurnos $l ChildHbfTurnos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfTurnosRelatedByIdAsociado(ChildHbfTurnos $l)
    {
        if ($this->collHbfTurnossRelatedByIdAsociado === null) {
            $this->initHbfTurnossRelatedByIdAsociado();
            $this->collHbfTurnossRelatedByIdAsociadoPartial = true;
        }

        if (!$this->collHbfTurnossRelatedByIdAsociado->contains($l)) {
            $this->doAddHbfTurnosRelatedByIdAsociado($l);

            if ($this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion and $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion->contains($l)) {
                $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion->remove($this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfTurnos $hbfTurnosRelatedByIdAsociado The ChildHbfTurnos object to add.
     */
    protected function doAddHbfTurnosRelatedByIdAsociado(ChildHbfTurnos $hbfTurnosRelatedByIdAsociado)
    {
        $this->collHbfTurnossRelatedByIdAsociado[]= $hbfTurnosRelatedByIdAsociado;
        $hbfTurnosRelatedByIdAsociado->setCiUsuariosRelatedByIdAsociado($this);
    }

    /**
     * @param  ChildHbfTurnos $hbfTurnosRelatedByIdAsociado The ChildHbfTurnos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfTurnosRelatedByIdAsociado(ChildHbfTurnos $hbfTurnosRelatedByIdAsociado)
    {
        if ($this->getHbfTurnossRelatedByIdAsociado()->contains($hbfTurnosRelatedByIdAsociado)) {
            $pos = $this->collHbfTurnossRelatedByIdAsociado->search($hbfTurnosRelatedByIdAsociado);
            $this->collHbfTurnossRelatedByIdAsociado->remove($pos);
            if (null === $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion) {
                $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion = clone $this->collHbfTurnossRelatedByIdAsociado;
                $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion->clear();
            }
            $this->hbfTurnossRelatedByIdAsociadoScheduledForDeletion[]= clone $hbfTurnosRelatedByIdAsociado;
            $hbfTurnosRelatedByIdAsociado->setCiUsuariosRelatedByIdAsociado(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfTurnossRelatedByIdAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossRelatedByIdAsociadoJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfTurnossRelatedByIdAsociado($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfTurnossRelatedByIdAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossRelatedByIdAsociadoJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfTurnossRelatedByIdAsociado($query, $con);
    }

    /**
     * Clears out the collHbfVasossRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfVasossRelatedByIdUserModified()
     */
    public function clearHbfVasossRelatedByIdUserModified()
    {
        $this->collHbfVasossRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfVasossRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfVasossRelatedByIdUserModified($v = true)
    {
        $this->collHbfVasossRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfVasossRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfVasossRelatedByIdUserModified collection to an empty array (like clearcollHbfVasossRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfVasossRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfVasossRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfVasosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfVasossRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfVasossRelatedByIdUserModified->setModel('\HbfVasos');
    }

    /**
     * Gets an array of ChildHbfVasos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     * @throws PropelException
     */
    public function getHbfVasossRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVasossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfVasossRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfVasossRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfVasossRelatedByIdUserModified();
            } else {
                $collHbfVasossRelatedByIdUserModified = ChildHbfVasosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfVasossRelatedByIdUserModifiedPartial && count($collHbfVasossRelatedByIdUserModified)) {
                        $this->initHbfVasossRelatedByIdUserModified(false);

                        foreach ($collHbfVasossRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfVasossRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfVasossRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfVasossRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfVasossRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfVasossRelatedByIdUserModified) {
                    foreach ($this->collHbfVasossRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfVasossRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfVasossRelatedByIdUserModified = $collHbfVasossRelatedByIdUserModified;
                $this->collHbfVasossRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfVasossRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfVasos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfVasossRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfVasossRelatedByIdUserModified(Collection $hbfVasossRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVasos[] $hbfVasossRelatedByIdUserModifiedToDelete */
        $hbfVasossRelatedByIdUserModifiedToDelete = $this->getHbfVasossRelatedByIdUserModified(new Criteria(), $con)->diff($hbfVasossRelatedByIdUserModified);


        $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion = $hbfVasossRelatedByIdUserModifiedToDelete;

        foreach ($hbfVasossRelatedByIdUserModifiedToDelete as $hbfVasosRelatedByIdUserModifiedRemoved) {
            $hbfVasosRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfVasossRelatedByIdUserModified = null;
        foreach ($hbfVasossRelatedByIdUserModified as $hbfVasosRelatedByIdUserModified) {
            $this->addHbfVasosRelatedByIdUserModified($hbfVasosRelatedByIdUserModified);
        }

        $this->collHbfVasossRelatedByIdUserModified = $hbfVasossRelatedByIdUserModified;
        $this->collHbfVasossRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfVasos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfVasos objects.
     * @throws PropelException
     */
    public function countHbfVasossRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVasossRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfVasossRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfVasossRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfVasossRelatedByIdUserModified());
            }

            $query = ChildHbfVasosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfVasossRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfVasos object to this object
     * through the ChildHbfVasos foreign key attribute.
     *
     * @param  ChildHbfVasos $l ChildHbfVasos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfVasosRelatedByIdUserModified(ChildHbfVasos $l)
    {
        if ($this->collHbfVasossRelatedByIdUserModified === null) {
            $this->initHbfVasossRelatedByIdUserModified();
            $this->collHbfVasossRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfVasossRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfVasosRelatedByIdUserModified($l);

            if ($this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion and $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfVasos $hbfVasosRelatedByIdUserModified The ChildHbfVasos object to add.
     */
    protected function doAddHbfVasosRelatedByIdUserModified(ChildHbfVasos $hbfVasosRelatedByIdUserModified)
    {
        $this->collHbfVasossRelatedByIdUserModified[]= $hbfVasosRelatedByIdUserModified;
        $hbfVasosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfVasos $hbfVasosRelatedByIdUserModified The ChildHbfVasos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfVasosRelatedByIdUserModified(ChildHbfVasos $hbfVasosRelatedByIdUserModified)
    {
        if ($this->getHbfVasossRelatedByIdUserModified()->contains($hbfVasosRelatedByIdUserModified)) {
            $pos = $this->collHbfVasossRelatedByIdUserModified->search($hbfVasosRelatedByIdUserModified);
            $this->collHbfVasossRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfVasossRelatedByIdUserModified;
                $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfVasossRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfVasosRelatedByIdUserModified;
            $hbfVasosRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVasossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossRelatedByIdUserModifiedJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfVasossRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVasossRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossRelatedByIdUserModifiedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfVasossRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfVasossRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfVasossRelatedByIdUserCreated()
     */
    public function clearHbfVasossRelatedByIdUserCreated()
    {
        $this->collHbfVasossRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfVasossRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfVasossRelatedByIdUserCreated($v = true)
    {
        $this->collHbfVasossRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfVasossRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfVasossRelatedByIdUserCreated collection to an empty array (like clearcollHbfVasossRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfVasossRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfVasossRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfVasosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfVasossRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfVasossRelatedByIdUserCreated->setModel('\HbfVasos');
    }

    /**
     * Gets an array of ChildHbfVasos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     * @throws PropelException
     */
    public function getHbfVasossRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVasossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfVasossRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfVasossRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfVasossRelatedByIdUserCreated();
            } else {
                $collHbfVasossRelatedByIdUserCreated = ChildHbfVasosQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfVasossRelatedByIdUserCreatedPartial && count($collHbfVasossRelatedByIdUserCreated)) {
                        $this->initHbfVasossRelatedByIdUserCreated(false);

                        foreach ($collHbfVasossRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfVasossRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfVasossRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfVasossRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfVasossRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfVasossRelatedByIdUserCreated) {
                    foreach ($this->collHbfVasossRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfVasossRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfVasossRelatedByIdUserCreated = $collHbfVasossRelatedByIdUserCreated;
                $this->collHbfVasossRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfVasossRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfVasos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfVasossRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfVasossRelatedByIdUserCreated(Collection $hbfVasossRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVasos[] $hbfVasossRelatedByIdUserCreatedToDelete */
        $hbfVasossRelatedByIdUserCreatedToDelete = $this->getHbfVasossRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfVasossRelatedByIdUserCreated);


        $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion = $hbfVasossRelatedByIdUserCreatedToDelete;

        foreach ($hbfVasossRelatedByIdUserCreatedToDelete as $hbfVasosRelatedByIdUserCreatedRemoved) {
            $hbfVasosRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfVasossRelatedByIdUserCreated = null;
        foreach ($hbfVasossRelatedByIdUserCreated as $hbfVasosRelatedByIdUserCreated) {
            $this->addHbfVasosRelatedByIdUserCreated($hbfVasosRelatedByIdUserCreated);
        }

        $this->collHbfVasossRelatedByIdUserCreated = $hbfVasossRelatedByIdUserCreated;
        $this->collHbfVasossRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfVasos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfVasos objects.
     * @throws PropelException
     */
    public function countHbfVasossRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVasossRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfVasossRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfVasossRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfVasossRelatedByIdUserCreated());
            }

            $query = ChildHbfVasosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfVasossRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfVasos object to this object
     * through the ChildHbfVasos foreign key attribute.
     *
     * @param  ChildHbfVasos $l ChildHbfVasos
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfVasosRelatedByIdUserCreated(ChildHbfVasos $l)
    {
        if ($this->collHbfVasossRelatedByIdUserCreated === null) {
            $this->initHbfVasossRelatedByIdUserCreated();
            $this->collHbfVasossRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfVasossRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfVasosRelatedByIdUserCreated($l);

            if ($this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion and $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfVasos $hbfVasosRelatedByIdUserCreated The ChildHbfVasos object to add.
     */
    protected function doAddHbfVasosRelatedByIdUserCreated(ChildHbfVasos $hbfVasosRelatedByIdUserCreated)
    {
        $this->collHbfVasossRelatedByIdUserCreated[]= $hbfVasosRelatedByIdUserCreated;
        $hbfVasosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfVasos $hbfVasosRelatedByIdUserCreated The ChildHbfVasos object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfVasosRelatedByIdUserCreated(ChildHbfVasos $hbfVasosRelatedByIdUserCreated)
    {
        if ($this->getHbfVasossRelatedByIdUserCreated()->contains($hbfVasosRelatedByIdUserCreated)) {
            $pos = $this->collHbfVasossRelatedByIdUserCreated->search($hbfVasosRelatedByIdUserCreated);
            $this->collHbfVasossRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfVasossRelatedByIdUserCreated;
                $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfVasossRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfVasosRelatedByIdUserCreated;
            $hbfVasosRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVasossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossRelatedByIdUserCreatedJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfVasossRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVasossRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossRelatedByIdUserCreatedJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfVasossRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfVentassRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfVentassRelatedByIdUserCreated()
     */
    public function clearHbfVentassRelatedByIdUserCreated()
    {
        $this->collHbfVentassRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfVentassRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialHbfVentassRelatedByIdUserCreated($v = true)
    {
        $this->collHbfVentassRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collHbfVentassRelatedByIdUserCreated collection.
     *
     * By default this just sets the collHbfVentassRelatedByIdUserCreated collection to an empty array (like clearcollHbfVentassRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfVentassRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collHbfVentassRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfVentasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfVentassRelatedByIdUserCreated = new $collectionClassName;
        $this->collHbfVentassRelatedByIdUserCreated->setModel('\HbfVentas');
    }

    /**
     * Gets an array of ChildHbfVentas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     * @throws PropelException
     */
    public function getHbfVentassRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfVentassRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfVentassRelatedByIdUserCreated) {
                // return empty collection
                $this->initHbfVentassRelatedByIdUserCreated();
            } else {
                $collHbfVentassRelatedByIdUserCreated = ChildHbfVentasQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfVentassRelatedByIdUserCreatedPartial && count($collHbfVentassRelatedByIdUserCreated)) {
                        $this->initHbfVentassRelatedByIdUserCreated(false);

                        foreach ($collHbfVentassRelatedByIdUserCreated as $obj) {
                            if (false == $this->collHbfVentassRelatedByIdUserCreated->contains($obj)) {
                                $this->collHbfVentassRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collHbfVentassRelatedByIdUserCreatedPartial = true;
                    }

                    return $collHbfVentassRelatedByIdUserCreated;
                }

                if ($partial && $this->collHbfVentassRelatedByIdUserCreated) {
                    foreach ($this->collHbfVentassRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collHbfVentassRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collHbfVentassRelatedByIdUserCreated = $collHbfVentassRelatedByIdUserCreated;
                $this->collHbfVentassRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collHbfVentassRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildHbfVentas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfVentassRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfVentassRelatedByIdUserCreated(Collection $hbfVentassRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVentas[] $hbfVentassRelatedByIdUserCreatedToDelete */
        $hbfVentassRelatedByIdUserCreatedToDelete = $this->getHbfVentassRelatedByIdUserCreated(new Criteria(), $con)->diff($hbfVentassRelatedByIdUserCreated);


        $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion = $hbfVentassRelatedByIdUserCreatedToDelete;

        foreach ($hbfVentassRelatedByIdUserCreatedToDelete as $hbfVentasRelatedByIdUserCreatedRemoved) {
            $hbfVentasRelatedByIdUserCreatedRemoved->setCiUsuariosRelatedByIdUserCreated(null);
        }

        $this->collHbfVentassRelatedByIdUserCreated = null;
        foreach ($hbfVentassRelatedByIdUserCreated as $hbfVentasRelatedByIdUserCreated) {
            $this->addHbfVentasRelatedByIdUserCreated($hbfVentasRelatedByIdUserCreated);
        }

        $this->collHbfVentassRelatedByIdUserCreated = $hbfVentassRelatedByIdUserCreated;
        $this->collHbfVentassRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfVentas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfVentas objects.
     * @throws PropelException
     */
    public function countHbfVentassRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collHbfVentassRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfVentassRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfVentassRelatedByIdUserCreated());
            }

            $query = ChildHbfVentasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collHbfVentassRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildHbfVentas object to this object
     * through the ChildHbfVentas foreign key attribute.
     *
     * @param  ChildHbfVentas $l ChildHbfVentas
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfVentasRelatedByIdUserCreated(ChildHbfVentas $l)
    {
        if ($this->collHbfVentassRelatedByIdUserCreated === null) {
            $this->initHbfVentassRelatedByIdUserCreated();
            $this->collHbfVentassRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collHbfVentassRelatedByIdUserCreated->contains($l)) {
            $this->doAddHbfVentasRelatedByIdUserCreated($l);

            if ($this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion and $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion->remove($this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfVentas $hbfVentasRelatedByIdUserCreated The ChildHbfVentas object to add.
     */
    protected function doAddHbfVentasRelatedByIdUserCreated(ChildHbfVentas $hbfVentasRelatedByIdUserCreated)
    {
        $this->collHbfVentassRelatedByIdUserCreated[]= $hbfVentasRelatedByIdUserCreated;
        $hbfVentasRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildHbfVentas $hbfVentasRelatedByIdUserCreated The ChildHbfVentas object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfVentasRelatedByIdUserCreated(ChildHbfVentas $hbfVentasRelatedByIdUserCreated)
    {
        if ($this->getHbfVentassRelatedByIdUserCreated()->contains($hbfVentasRelatedByIdUserCreated)) {
            $pos = $this->collHbfVentassRelatedByIdUserCreated->search($hbfVentasRelatedByIdUserCreated);
            $this->collHbfVentassRelatedByIdUserCreated->remove($pos);
            if (null === $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion) {
                $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion = clone $this->collHbfVentassRelatedByIdUserCreated;
                $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->hbfVentassRelatedByIdUserCreatedScheduledForDeletion[]= clone $hbfVentasRelatedByIdUserCreated;
            $hbfVentasRelatedByIdUserCreated->setCiUsuariosRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserCreatedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserCreatedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserCreatedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserCreatedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collHbfVentassRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfVentassRelatedByIdUserModified()
     */
    public function clearHbfVentassRelatedByIdUserModified()
    {
        $this->collHbfVentassRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfVentassRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialHbfVentassRelatedByIdUserModified($v = true)
    {
        $this->collHbfVentassRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collHbfVentassRelatedByIdUserModified collection.
     *
     * By default this just sets the collHbfVentassRelatedByIdUserModified collection to an empty array (like clearcollHbfVentassRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfVentassRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collHbfVentassRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfVentasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfVentassRelatedByIdUserModified = new $collectionClassName;
        $this->collHbfVentassRelatedByIdUserModified->setModel('\HbfVentas');
    }

    /**
     * Gets an array of ChildHbfVentas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     * @throws PropelException
     */
    public function getHbfVentassRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfVentassRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfVentassRelatedByIdUserModified) {
                // return empty collection
                $this->initHbfVentassRelatedByIdUserModified();
            } else {
                $collHbfVentassRelatedByIdUserModified = ChildHbfVentasQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfVentassRelatedByIdUserModifiedPartial && count($collHbfVentassRelatedByIdUserModified)) {
                        $this->initHbfVentassRelatedByIdUserModified(false);

                        foreach ($collHbfVentassRelatedByIdUserModified as $obj) {
                            if (false == $this->collHbfVentassRelatedByIdUserModified->contains($obj)) {
                                $this->collHbfVentassRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collHbfVentassRelatedByIdUserModifiedPartial = true;
                    }

                    return $collHbfVentassRelatedByIdUserModified;
                }

                if ($partial && $this->collHbfVentassRelatedByIdUserModified) {
                    foreach ($this->collHbfVentassRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collHbfVentassRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collHbfVentassRelatedByIdUserModified = $collHbfVentassRelatedByIdUserModified;
                $this->collHbfVentassRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collHbfVentassRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildHbfVentas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfVentassRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfVentassRelatedByIdUserModified(Collection $hbfVentassRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVentas[] $hbfVentassRelatedByIdUserModifiedToDelete */
        $hbfVentassRelatedByIdUserModifiedToDelete = $this->getHbfVentassRelatedByIdUserModified(new Criteria(), $con)->diff($hbfVentassRelatedByIdUserModified);


        $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion = $hbfVentassRelatedByIdUserModifiedToDelete;

        foreach ($hbfVentassRelatedByIdUserModifiedToDelete as $hbfVentasRelatedByIdUserModifiedRemoved) {
            $hbfVentasRelatedByIdUserModifiedRemoved->setCiUsuariosRelatedByIdUserModified(null);
        }

        $this->collHbfVentassRelatedByIdUserModified = null;
        foreach ($hbfVentassRelatedByIdUserModified as $hbfVentasRelatedByIdUserModified) {
            $this->addHbfVentasRelatedByIdUserModified($hbfVentasRelatedByIdUserModified);
        }

        $this->collHbfVentassRelatedByIdUserModified = $hbfVentassRelatedByIdUserModified;
        $this->collHbfVentassRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfVentas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfVentas objects.
     * @throws PropelException
     */
    public function countHbfVentassRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collHbfVentassRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfVentassRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfVentassRelatedByIdUserModified());
            }

            $query = ChildHbfVentasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collHbfVentassRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildHbfVentas object to this object
     * through the ChildHbfVentas foreign key attribute.
     *
     * @param  ChildHbfVentas $l ChildHbfVentas
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfVentasRelatedByIdUserModified(ChildHbfVentas $l)
    {
        if ($this->collHbfVentassRelatedByIdUserModified === null) {
            $this->initHbfVentassRelatedByIdUserModified();
            $this->collHbfVentassRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collHbfVentassRelatedByIdUserModified->contains($l)) {
            $this->doAddHbfVentasRelatedByIdUserModified($l);

            if ($this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion and $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion->remove($this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfVentas $hbfVentasRelatedByIdUserModified The ChildHbfVentas object to add.
     */
    protected function doAddHbfVentasRelatedByIdUserModified(ChildHbfVentas $hbfVentasRelatedByIdUserModified)
    {
        $this->collHbfVentassRelatedByIdUserModified[]= $hbfVentasRelatedByIdUserModified;
        $hbfVentasRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildHbfVentas $hbfVentasRelatedByIdUserModified The ChildHbfVentas object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfVentasRelatedByIdUserModified(ChildHbfVentas $hbfVentasRelatedByIdUserModified)
    {
        if ($this->getHbfVentassRelatedByIdUserModified()->contains($hbfVentasRelatedByIdUserModified)) {
            $pos = $this->collHbfVentassRelatedByIdUserModified->search($hbfVentasRelatedByIdUserModified);
            $this->collHbfVentassRelatedByIdUserModified->remove($pos);
            if (null === $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion) {
                $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion = clone $this->collHbfVentassRelatedByIdUserModified;
                $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->hbfVentassRelatedByIdUserModifiedScheduledForDeletion[]= clone $hbfVentasRelatedByIdUserModified;
            $hbfVentasRelatedByIdUserModified->setCiUsuariosRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserModifiedJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserModifiedJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserModifiedJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdUserModifiedJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfVentassRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collHbfVentassRelatedByIdCliente collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfVentassRelatedByIdCliente()
     */
    public function clearHbfVentassRelatedByIdCliente()
    {
        $this->collHbfVentassRelatedByIdCliente = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfVentassRelatedByIdCliente collection loaded partially.
     */
    public function resetPartialHbfVentassRelatedByIdCliente($v = true)
    {
        $this->collHbfVentassRelatedByIdClientePartial = $v;
    }

    /**
     * Initializes the collHbfVentassRelatedByIdCliente collection.
     *
     * By default this just sets the collHbfVentassRelatedByIdCliente collection to an empty array (like clearcollHbfVentassRelatedByIdCliente());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfVentassRelatedByIdCliente($overrideExisting = true)
    {
        if (null !== $this->collHbfVentassRelatedByIdCliente && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfVentasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfVentassRelatedByIdCliente = new $collectionClassName;
        $this->collHbfVentassRelatedByIdCliente->setModel('\HbfVentas');
    }

    /**
     * Gets an array of ChildHbfVentas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiUsuarios is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     * @throws PropelException
     */
    public function getHbfVentassRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfVentassRelatedByIdCliente || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfVentassRelatedByIdCliente) {
                // return empty collection
                $this->initHbfVentassRelatedByIdCliente();
            } else {
                $collHbfVentassRelatedByIdCliente = ChildHbfVentasQuery::create(null, $criteria)
                    ->filterByCiUsuariosRelatedByIdCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfVentassRelatedByIdClientePartial && count($collHbfVentassRelatedByIdCliente)) {
                        $this->initHbfVentassRelatedByIdCliente(false);

                        foreach ($collHbfVentassRelatedByIdCliente as $obj) {
                            if (false == $this->collHbfVentassRelatedByIdCliente->contains($obj)) {
                                $this->collHbfVentassRelatedByIdCliente->append($obj);
                            }
                        }

                        $this->collHbfVentassRelatedByIdClientePartial = true;
                    }

                    return $collHbfVentassRelatedByIdCliente;
                }

                if ($partial && $this->collHbfVentassRelatedByIdCliente) {
                    foreach ($this->collHbfVentassRelatedByIdCliente as $obj) {
                        if ($obj->isNew()) {
                            $collHbfVentassRelatedByIdCliente[] = $obj;
                        }
                    }
                }

                $this->collHbfVentassRelatedByIdCliente = $collHbfVentassRelatedByIdCliente;
                $this->collHbfVentassRelatedByIdClientePartial = false;
            }
        }

        return $this->collHbfVentassRelatedByIdCliente;
    }

    /**
     * Sets a collection of ChildHbfVentas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfVentassRelatedByIdCliente A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function setHbfVentassRelatedByIdCliente(Collection $hbfVentassRelatedByIdCliente, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVentas[] $hbfVentassRelatedByIdClienteToDelete */
        $hbfVentassRelatedByIdClienteToDelete = $this->getHbfVentassRelatedByIdCliente(new Criteria(), $con)->diff($hbfVentassRelatedByIdCliente);


        $this->hbfVentassRelatedByIdClienteScheduledForDeletion = $hbfVentassRelatedByIdClienteToDelete;

        foreach ($hbfVentassRelatedByIdClienteToDelete as $hbfVentasRelatedByIdClienteRemoved) {
            $hbfVentasRelatedByIdClienteRemoved->setCiUsuariosRelatedByIdCliente(null);
        }

        $this->collHbfVentassRelatedByIdCliente = null;
        foreach ($hbfVentassRelatedByIdCliente as $hbfVentasRelatedByIdCliente) {
            $this->addHbfVentasRelatedByIdCliente($hbfVentasRelatedByIdCliente);
        }

        $this->collHbfVentassRelatedByIdCliente = $hbfVentassRelatedByIdCliente;
        $this->collHbfVentassRelatedByIdClientePartial = false;

        return $this;
    }

    /**
     * Returns the number of related HbfVentas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related HbfVentas objects.
     * @throws PropelException
     */
    public function countHbfVentassRelatedByIdCliente(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassRelatedByIdClientePartial && !$this->isNew();
        if (null === $this->collHbfVentassRelatedByIdCliente || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfVentassRelatedByIdCliente) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfVentassRelatedByIdCliente());
            }

            $query = ChildHbfVentasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiUsuariosRelatedByIdCliente($this)
                ->count($con);
        }

        return count($this->collHbfVentassRelatedByIdCliente);
    }

    /**
     * Method called to associate a ChildHbfVentas object to this object
     * through the ChildHbfVentas foreign key attribute.
     *
     * @param  ChildHbfVentas $l ChildHbfVentas
     * @return $this|\CiUsuarios The current object (for fluent API support)
     */
    public function addHbfVentasRelatedByIdCliente(ChildHbfVentas $l)
    {
        if ($this->collHbfVentassRelatedByIdCliente === null) {
            $this->initHbfVentassRelatedByIdCliente();
            $this->collHbfVentassRelatedByIdClientePartial = true;
        }

        if (!$this->collHbfVentassRelatedByIdCliente->contains($l)) {
            $this->doAddHbfVentasRelatedByIdCliente($l);

            if ($this->hbfVentassRelatedByIdClienteScheduledForDeletion and $this->hbfVentassRelatedByIdClienteScheduledForDeletion->contains($l)) {
                $this->hbfVentassRelatedByIdClienteScheduledForDeletion->remove($this->hbfVentassRelatedByIdClienteScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfVentas $hbfVentasRelatedByIdCliente The ChildHbfVentas object to add.
     */
    protected function doAddHbfVentasRelatedByIdCliente(ChildHbfVentas $hbfVentasRelatedByIdCliente)
    {
        $this->collHbfVentassRelatedByIdCliente[]= $hbfVentasRelatedByIdCliente;
        $hbfVentasRelatedByIdCliente->setCiUsuariosRelatedByIdCliente($this);
    }

    /**
     * @param  ChildHbfVentas $hbfVentasRelatedByIdCliente The ChildHbfVentas object to remove.
     * @return $this|ChildCiUsuarios The current object (for fluent API support)
     */
    public function removeHbfVentasRelatedByIdCliente(ChildHbfVentas $hbfVentasRelatedByIdCliente)
    {
        if ($this->getHbfVentassRelatedByIdCliente()->contains($hbfVentasRelatedByIdCliente)) {
            $pos = $this->collHbfVentassRelatedByIdCliente->search($hbfVentasRelatedByIdCliente);
            $this->collHbfVentassRelatedByIdCliente->remove($pos);
            if (null === $this->hbfVentassRelatedByIdClienteScheduledForDeletion) {
                $this->hbfVentassRelatedByIdClienteScheduledForDeletion = clone $this->collHbfVentassRelatedByIdCliente;
                $this->hbfVentassRelatedByIdClienteScheduledForDeletion->clear();
            }
            $this->hbfVentassRelatedByIdClienteScheduledForDeletion[]= $hbfVentasRelatedByIdCliente;
            $hbfVentasRelatedByIdCliente->setCiUsuariosRelatedByIdCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdClienteJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfVentassRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdClienteJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfVentassRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdClienteJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfVentassRelatedByIdCliente($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiUsuarios is new, it will return
     * an empty collection; or if this CiUsuarios has previously
     * been saved, it will retrieve related HbfVentassRelatedByIdCliente from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiUsuarios.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassRelatedByIdClienteJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfVentassRelatedByIdCliente($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCiOptionsRelatedByIdOptionTipoAsociado) {
            $this->aCiOptionsRelatedByIdOptionTipoAsociado->removeCiUsuariosRelatedByIdOptionTipoAsociado($this);
        }
        if (null !== $this->aCiOptionsRelatedByIdOptionNivelAsociado) {
            $this->aCiOptionsRelatedByIdOptionNivelAsociado->removeCiUsuariosRelatedByIdOptionNivelAsociado($this);
        }
        if (null !== $this->aCiUsuariosRelatedByInvitadoPor) {
            $this->aCiUsuariosRelatedByInvitadoPor->removeCiUsuariosRelatedByIdUsuario($this);
        }
        if (null !== $this->aCiOptionsRelatedByIdOpcionRole) {
            $this->aCiOptionsRelatedByIdOpcionRole->removeCiUsuariosRelatedByIdOpcionRole($this);
        }
        if (null !== $this->aHbfTurnosRelatedByIdTurno) {
            $this->aHbfTurnosRelatedByIdTurno->removeCiUsuariosRelatedByIdTurno($this);
        }
        if (null !== $this->aHbfSesionesRelatedByIdSesion) {
            $this->aHbfSesionesRelatedByIdSesion->removeCiUsuariosRelatedByIdSesion($this);
        }
        if (null !== $this->aCiOptionsRelatedByIdTipoUsuario) {
            $this->aCiOptionsRelatedByIdTipoUsuario->removeCiUsuariosRelatedByIdTipoUsuario($this);
        }
        if (null !== $this->aHbfClubsRelatedByIdClub) {
            $this->aHbfClubsRelatedByIdClub->removeCiUsuariosRelatedByIdClub($this);
        }
        $this->id_usuario = null;
        $this->nombre = null;
        $this->apellido = null;
        $this->username = null;
        $this->email = null;
        $this->password = null;
        $this->fec_nacimiento = null;
        $this->sexo = null;
        $this->invitado_por = null;
        $this->phone_number_1 = null;
        $this->phone_number_2 = null;
        $this->cellphone_number_1 = null;
        $this->cellphone_number_2 = null;
        $this->cod_acceso = null;
        $this->id_option_tipo_asociado = null;
        $this->id_option_nivel_asociado = null;
        $this->id_club = null;
        $this->id_turno = null;
        $this->id_sesion = null;
        $this->id_opcion_role = null;
        $this->foto_perfil = null;
        $this->app_monitor = null;
        $this->app_orders = null;
        $this->app_admin = null;
        $this->change_count = null;
        $this->herbalife_key = null;
        $this->id_tipo_usuario = null;
        $this->estado = null;
        $this->date_modified = null;
        $this->date_created = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collCiModulossRelatedByIdUserCreated) {
                foreach ($this->collCiModulossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiModulossRelatedByIdUserModified) {
                foreach ($this->collCiModulossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiOptionssRelatedByIdUserCreated) {
                foreach ($this->collCiOptionssRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiOptionssRelatedByIdUserModified) {
                foreach ($this->collCiOptionssRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiSessionss) {
                foreach ($this->collCiSessionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiSettingssRelatedByIdUserCreated) {
                foreach ($this->collCiSettingssRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiSettingssRelatedByIdUserModified) {
                foreach ($this->collCiSettingssRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdUsuario) {
                foreach ($this->collCiUsuariossRelatedByIdUsuario as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfClubssRelatedByIdUserCreated) {
                foreach ($this->collHbfClubssRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfClubssRelatedByIdUserModified) {
                foreach ($this->collHbfClubssRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfComandassRelatedByIdUserCreated) {
                foreach ($this->collHbfComandassRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfComandassRelatedByIdUserModified) {
                foreach ($this->collHbfComandassRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfComandassRelatedByIdCliente) {
                foreach ($this->collHbfComandassRelatedByIdCliente as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfDetallesPedidossRelatedByIdUserCreated) {
                foreach ($this->collHbfDetallesPedidossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfDetallesPedidossRelatedByIdUserModified) {
                foreach ($this->collHbfDetallesPedidossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfEgresossRelatedByIdUserCreated) {
                foreach ($this->collHbfEgresossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfEgresossRelatedByIdUserModified) {
                foreach ($this->collHbfEgresossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfEgresossRelatedByIdCliente) {
                foreach ($this->collHbfEgresossRelatedByIdCliente as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfIngresossRelatedByIdUserCreated) {
                foreach ($this->collHbfIngresossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfIngresossRelatedByIdUserModified) {
                foreach ($this->collHbfIngresossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfIngresossRelatedByIdCliente) {
                foreach ($this->collHbfIngresossRelatedByIdCliente as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfPorcionessRelatedByIdUserCreated) {
                foreach ($this->collHbfPorcionessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfPorcionessRelatedByIdUserModified) {
                foreach ($this->collHbfPorcionessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfPrepagossRelatedByIdCliente) {
                foreach ($this->collHbfPrepagossRelatedByIdCliente as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfPrepagossRelatedByIdUserCreated) {
                foreach ($this->collHbfPrepagossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfPrepagossRelatedByIdUserModified) {
                foreach ($this->collHbfPrepagossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfProductossRelatedByIdUserCreated) {
                foreach ($this->collHbfProductossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfProductossRelatedByIdUserModified) {
                foreach ($this->collHbfProductossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfSesionessRelatedByIdUserCreated) {
                foreach ($this->collHbfSesionessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfSesionessRelatedByIdUserModified) {
                foreach ($this->collHbfSesionessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfSesionessRelatedByIdAsociado) {
                foreach ($this->collHbfSesionessRelatedByIdAsociado as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfTurnossRelatedByIdUserCreated) {
                foreach ($this->collHbfTurnossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfTurnossRelatedByIdUserModified) {
                foreach ($this->collHbfTurnossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfTurnossRelatedByIdAsociado) {
                foreach ($this->collHbfTurnossRelatedByIdAsociado as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVasossRelatedByIdUserModified) {
                foreach ($this->collHbfVasossRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVasossRelatedByIdUserCreated) {
                foreach ($this->collHbfVasossRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVentassRelatedByIdUserCreated) {
                foreach ($this->collHbfVentassRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVentassRelatedByIdUserModified) {
                foreach ($this->collHbfVentassRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVentassRelatedByIdCliente) {
                foreach ($this->collHbfVentassRelatedByIdCliente as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCiModulossRelatedByIdUserCreated = null;
        $this->collCiModulossRelatedByIdUserModified = null;
        $this->collCiOptionssRelatedByIdUserCreated = null;
        $this->collCiOptionssRelatedByIdUserModified = null;
        $this->collCiSessionss = null;
        $this->collCiSettingssRelatedByIdUserCreated = null;
        $this->collCiSettingssRelatedByIdUserModified = null;
        $this->collCiUsuariossRelatedByIdUsuario = null;
        $this->collHbfClubssRelatedByIdUserCreated = null;
        $this->collHbfClubssRelatedByIdUserModified = null;
        $this->collHbfComandassRelatedByIdUserCreated = null;
        $this->collHbfComandassRelatedByIdUserModified = null;
        $this->collHbfComandassRelatedByIdCliente = null;
        $this->collHbfDetallesPedidossRelatedByIdUserCreated = null;
        $this->collHbfDetallesPedidossRelatedByIdUserModified = null;
        $this->collHbfEgresossRelatedByIdUserCreated = null;
        $this->collHbfEgresossRelatedByIdUserModified = null;
        $this->collHbfEgresossRelatedByIdCliente = null;
        $this->collHbfIngresossRelatedByIdUserCreated = null;
        $this->collHbfIngresossRelatedByIdUserModified = null;
        $this->collHbfIngresossRelatedByIdCliente = null;
        $this->collHbfPorcionessRelatedByIdUserCreated = null;
        $this->collHbfPorcionessRelatedByIdUserModified = null;
        $this->collHbfPrepagossRelatedByIdCliente = null;
        $this->collHbfPrepagossRelatedByIdUserCreated = null;
        $this->collHbfPrepagossRelatedByIdUserModified = null;
        $this->collHbfProductossRelatedByIdUserCreated = null;
        $this->collHbfProductossRelatedByIdUserModified = null;
        $this->collHbfSesionessRelatedByIdUserCreated = null;
        $this->collHbfSesionessRelatedByIdUserModified = null;
        $this->collHbfSesionessRelatedByIdAsociado = null;
        $this->collHbfTurnossRelatedByIdUserCreated = null;
        $this->collHbfTurnossRelatedByIdUserModified = null;
        $this->collHbfTurnossRelatedByIdAsociado = null;
        $this->collHbfVasossRelatedByIdUserModified = null;
        $this->collHbfVasossRelatedByIdUserCreated = null;
        $this->collHbfVentassRelatedByIdUserCreated = null;
        $this->collHbfVentassRelatedByIdUserModified = null;
        $this->collHbfVentassRelatedByIdCliente = null;
        $this->aCiOptionsRelatedByIdOptionTipoAsociado = null;
        $this->aCiOptionsRelatedByIdOptionNivelAsociado = null;
        $this->aCiUsuariosRelatedByInvitadoPor = null;
        $this->aCiOptionsRelatedByIdOpcionRole = null;
        $this->aHbfTurnosRelatedByIdTurno = null;
        $this->aHbfSesionesRelatedByIdSesion = null;
        $this->aCiOptionsRelatedByIdTipoUsuario = null;
        $this->aHbfClubsRelatedByIdClub = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CiUsuariosTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
