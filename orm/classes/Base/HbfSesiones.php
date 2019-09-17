<?php

namespace Base;

use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
use \CiSessions as ChildCiSessions;
use \CiSessionsQuery as ChildCiSessionsQuery;
use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \HbfClubs as ChildHbfClubs;
use \HbfClubsQuery as ChildHbfClubsQuery;
use \HbfComandas as ChildHbfComandas;
use \HbfComandasQuery as ChildHbfComandasQuery;
use \HbfEgresos as ChildHbfEgresos;
use \HbfEgresosQuery as ChildHbfEgresosQuery;
use \HbfPrepagos as ChildHbfPrepagos;
use \HbfPrepagosQuery as ChildHbfPrepagosQuery;
use \HbfSesiones as ChildHbfSesiones;
use \HbfSesionesQuery as ChildHbfSesionesQuery;
use \HbfTurnos as ChildHbfTurnos;
use \HbfTurnosQuery as ChildHbfTurnosQuery;
use \HbfVentas as ChildHbfVentas;
use \HbfVentasQuery as ChildHbfVentasQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CiSessionsTableMap;
use Map\CiUsuariosTableMap;
use Map\HbfComandasTableMap;
use Map\HbfEgresosTableMap;
use Map\HbfPrepagosTableMap;
use Map\HbfSesionesTableMap;
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
 * Base class that represents a row from the 'hbf_sesiones' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class HbfSesiones implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\HbfSesionesTableMap';


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
     * The value for the id_sesion field.
     *
     * @var        int
     */
    protected $id_sesion;

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
     * The value for the id_asociado field.
     *
     * @var        int
     */
    protected $id_asociado;

    /**
     * The value for the detalle field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $detalle;

    /**
     * The value for the caja_inicial field.
     *
     * @var        string
     */
    protected $caja_inicial;

    /**
     * The value for the caja_final field.
     *
     * @var        string
     */
    protected $caja_final;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the num_consumos field.
     *
     * @var        string
     */
    protected $num_consumos;

    /**
     * The value for the total_ingresos field.
     *
     * @var        string
     */
    protected $total_ingresos;

    /**
     * The value for the total_egresos field.
     *
     * @var        string
     */
    protected $total_egresos;

    /**
     * The value for the total_deben field.
     *
     * @var        string
     */
    protected $total_deben;

    /**
     * The value for the total_sobra field.
     *
     * @var        string
     */
    protected $total_sobra;

    /**
     * The value for the total_falta field.
     *
     * @var        string
     */
    protected $total_falta;

    /**
     * The value for the sobre_rojo field.
     *
     * @var        string
     */
    protected $sobre_rojo;

    /**
     * The value for the sobre_verde field.
     *
     * @var        string
     */
    protected $sobre_verde;

    /**
     * The value for the deposito field.
     *
     * @var        string
     */
    protected $deposito;

    /**
     * The value for the cerrado field.
     *
     * @var        string
     */
    protected $cerrado;

    /**
     * The value for the observaciones field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $observaciones;

    /**
     * The value for the fec_sesion field.
     *
     * @var        DateTime
     */
    protected $fec_sesion;

    /**
     * The value for the id_opcion_sesion field.
     *
     * @var        int
     */
    protected $id_opcion_sesion;

    /**
     * The value for the estado field.
     *
     * Note: this column has a database default value of: 'ENABLED'
     * @var        string
     */
    protected $estado;

    /**
     * The value for the change_count field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $change_count;

    /**
     * The value for the id_user_modified field.
     *
     * @var        int
     */
    protected $id_user_modified;

    /**
     * The value for the id_user_created field.
     *
     * @var        int
     */
    protected $id_user_created;

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
     * @var        ChildCiUsuarios
     */
    protected $aCiUsuariosRelatedByIdUserCreated;

    /**
     * @var        ChildCiUsuarios
     */
    protected $aCiUsuariosRelatedByIdUserModified;

    /**
     * @var        ChildHbfClubs
     */
    protected $aHbfClubs;

    /**
     * @var        ChildCiUsuarios
     */
    protected $aCiUsuariosRelatedByIdAsociado;

    /**
     * @var        ChildHbfTurnos
     */
    protected $aHbfTurnos;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptions;

    /**
     * @var        ObjectCollection|ChildCiSessions[] Collection to store aggregation of ChildCiSessions objects.
     */
    protected $collCiSessionss;
    protected $collCiSessionssPartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdSesion;
    protected $collCiUsuariossRelatedByIdSesionPartial;

    /**
     * @var        ObjectCollection|ChildHbfComandas[] Collection to store aggregation of ChildHbfComandas objects.
     */
    protected $collHbfComandass;
    protected $collHbfComandassPartial;

    /**
     * @var        ObjectCollection|ChildHbfEgresos[] Collection to store aggregation of ChildHbfEgresos objects.
     */
    protected $collHbfEgresoss;
    protected $collHbfEgresossPartial;

    /**
     * @var        ObjectCollection|ChildHbfPrepagos[] Collection to store aggregation of ChildHbfPrepagos objects.
     */
    protected $collHbfPrepagoss;
    protected $collHbfPrepagossPartial;

    /**
     * @var        ObjectCollection|ChildHbfVentas[] Collection to store aggregation of ChildHbfVentas objects.
     */
    protected $collHbfVentass;
    protected $collHbfVentassPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiSessions[]
     */
    protected $ciSessionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdSesionScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfComandas[]
     */
    protected $hbfComandassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfEgresos[]
     */
    protected $hbfEgresossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfPrepagos[]
     */
    protected $hbfPrepagossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfVentas[]
     */
    protected $hbfVentassScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->detalle = '';
        $this->observaciones = '';
        $this->estado = 'ENABLED';
        $this->change_count = 0;
    }

    /**
     * Initializes internal state of Base\HbfSesiones object.
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
     * Compares this with another <code>HbfSesiones</code> instance.  If
     * <code>obj</code> is an instance of <code>HbfSesiones</code>, delegates to
     * <code>equals(HbfSesiones)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|HbfSesiones The current object, for fluid interface
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
     * Get the [id_sesion] column value.
     *
     * @return int
     */
    public function getIdSesion()
    {
        return $this->id_sesion;
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
     * Get the [id_asociado] column value.
     *
     * @return int
     */
    public function getIdAsociado()
    {
        return $this->id_asociado;
    }

    /**
     * Get the [detalle] column value.
     *
     * @return string
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Get the [caja_inicial] column value.
     *
     * @return string
     */
    public function getCajaInicial()
    {
        return $this->caja_inicial;
    }

    /**
     * Get the [caja_final] column value.
     *
     * @return string
     */
    public function getCajaFinal()
    {
        return $this->caja_final;
    }

    /**
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [num_consumos] column value.
     *
     * @return string
     */
    public function getNumConsumos()
    {
        return $this->num_consumos;
    }

    /**
     * Get the [total_ingresos] column value.
     *
     * @return string
     */
    public function getTotalIngresos()
    {
        return $this->total_ingresos;
    }

    /**
     * Get the [total_egresos] column value.
     *
     * @return string
     */
    public function getTotalEgresos()
    {
        return $this->total_egresos;
    }

    /**
     * Get the [total_deben] column value.
     *
     * @return string
     */
    public function getTotalDeben()
    {
        return $this->total_deben;
    }

    /**
     * Get the [total_sobra] column value.
     *
     * @return string
     */
    public function getTotalSobra()
    {
        return $this->total_sobra;
    }

    /**
     * Get the [total_falta] column value.
     *
     * @return string
     */
    public function getTotalFalta()
    {
        return $this->total_falta;
    }

    /**
     * Get the [sobre_rojo] column value.
     *
     * @return string
     */
    public function getSobreRojo()
    {
        return $this->sobre_rojo;
    }

    /**
     * Get the [sobre_verde] column value.
     *
     * @return string
     */
    public function getSobreVerde()
    {
        return $this->sobre_verde;
    }

    /**
     * Get the [deposito] column value.
     *
     * @return string
     */
    public function getDeposito()
    {
        return $this->deposito;
    }

    /**
     * Get the [cerrado] column value.
     *
     * @return string
     */
    public function getCerrado()
    {
        return $this->cerrado;
    }

    /**
     * Get the [observaciones] column value.
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Get the [optionally formatted] temporal [fec_sesion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFecSesion($format = NULL)
    {
        if ($format === null) {
            return $this->fec_sesion;
        } else {
            return $this->fec_sesion instanceof \DateTimeInterface ? $this->fec_sesion->format($format) : null;
        }
    }

    /**
     * Get the [id_opcion_sesion] column value.
     *
     * @return int
     */
    public function getIdOpcionSesion()
    {
        return $this->id_opcion_sesion;
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
     * Get the [change_count] column value.
     *
     * @return int
     */
    public function getChangeCount()
    {
        return $this->change_count;
    }

    /**
     * Get the [id_user_modified] column value.
     *
     * @return int
     */
    public function getIdUserModified()
    {
        return $this->id_user_modified;
    }

    /**
     * Get the [id_user_created] column value.
     *
     * @return int
     */
    public function getIdUserCreated()
    {
        return $this->id_user_created;
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
     * Set the value of [id_sesion] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setIdSesion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sesion !== $v) {
            $this->id_sesion = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ID_SESION] = true;
        }

        return $this;
    } // setIdSesion()

    /**
     * Set the value of [id_club] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setIdClub($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_club !== $v) {
            $this->id_club = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ID_CLUB] = true;
        }

        if ($this->aHbfClubs !== null && $this->aHbfClubs->getIdClub() !== $v) {
            $this->aHbfClubs = null;
        }

        return $this;
    } // setIdClub()

    /**
     * Set the value of [id_turno] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setIdTurno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_turno !== $v) {
            $this->id_turno = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ID_TURNO] = true;
        }

        if ($this->aHbfTurnos !== null && $this->aHbfTurnos->getIdTurno() !== $v) {
            $this->aHbfTurnos = null;
        }

        return $this;
    } // setIdTurno()

    /**
     * Set the value of [id_asociado] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setIdAsociado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_asociado !== $v) {
            $this->id_asociado = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ID_ASOCIADO] = true;
        }

        if ($this->aCiUsuariosRelatedByIdAsociado !== null && $this->aCiUsuariosRelatedByIdAsociado->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdAsociado = null;
        }

        return $this;
    } // setIdAsociado()

    /**
     * Set the value of [detalle] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setDetalle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->detalle !== $v) {
            $this->detalle = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_DETALLE] = true;
        }

        return $this;
    } // setDetalle()

    /**
     * Set the value of [caja_inicial] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setCajaInicial($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caja_inicial !== $v) {
            $this->caja_inicial = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_CAJA_INICIAL] = true;
        }

        return $this;
    } // setCajaInicial()

    /**
     * Set the value of [caja_final] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setCajaFinal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caja_final !== $v) {
            $this->caja_final = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_CAJA_FINAL] = true;
        }

        return $this;
    } // setCajaFinal()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [num_consumos] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setNumConsumos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->num_consumos !== $v) {
            $this->num_consumos = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_NUM_CONSUMOS] = true;
        }

        return $this;
    } // setNumConsumos()

    /**
     * Set the value of [total_ingresos] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setTotalIngresos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_ingresos !== $v) {
            $this->total_ingresos = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_TOTAL_INGRESOS] = true;
        }

        return $this;
    } // setTotalIngresos()

    /**
     * Set the value of [total_egresos] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setTotalEgresos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_egresos !== $v) {
            $this->total_egresos = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_TOTAL_EGRESOS] = true;
        }

        return $this;
    } // setTotalEgresos()

    /**
     * Set the value of [total_deben] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setTotalDeben($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_deben !== $v) {
            $this->total_deben = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_TOTAL_DEBEN] = true;
        }

        return $this;
    } // setTotalDeben()

    /**
     * Set the value of [total_sobra] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setTotalSobra($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_sobra !== $v) {
            $this->total_sobra = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_TOTAL_SOBRA] = true;
        }

        return $this;
    } // setTotalSobra()

    /**
     * Set the value of [total_falta] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setTotalFalta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_falta !== $v) {
            $this->total_falta = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_TOTAL_FALTA] = true;
        }

        return $this;
    } // setTotalFalta()

    /**
     * Set the value of [sobre_rojo] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setSobreRojo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sobre_rojo !== $v) {
            $this->sobre_rojo = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_SOBRE_ROJO] = true;
        }

        return $this;
    } // setSobreRojo()

    /**
     * Set the value of [sobre_verde] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setSobreVerde($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sobre_verde !== $v) {
            $this->sobre_verde = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_SOBRE_VERDE] = true;
        }

        return $this;
    } // setSobreVerde()

    /**
     * Set the value of [deposito] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setDeposito($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->deposito !== $v) {
            $this->deposito = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_DEPOSITO] = true;
        }

        return $this;
    } // setDeposito()

    /**
     * Set the value of [cerrado] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setCerrado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cerrado !== $v) {
            $this->cerrado = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_CERRADO] = true;
        }

        return $this;
    } // setCerrado()

    /**
     * Set the value of [observaciones] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setObservaciones($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->observaciones !== $v) {
            $this->observaciones = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_OBSERVACIONES] = true;
        }

        return $this;
    } // setObservaciones()

    /**
     * Sets the value of [fec_sesion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setFecSesion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fec_sesion !== null || $dt !== null) {
            if ($this->fec_sesion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->fec_sesion->format("Y-m-d H:i:s.u")) {
                $this->fec_sesion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfSesionesTableMap::COL_FEC_SESION] = true;
            }
        } // if either are not null

        return $this;
    } // setFecSesion()

    /**
     * Set the value of [id_opcion_sesion] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setIdOpcionSesion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_opcion_sesion !== $v) {
            $this->id_opcion_sesion = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ID_OPCION_SESION] = true;
        }

        if ($this->aCiOptions !== null && $this->aCiOptions->getIdOption() !== $v) {
            $this->aCiOptions = null;
        }

        return $this;
    } // setIdOpcionSesion()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ID_USER_MODIFIED] = true;
        }

        if ($this->aCiUsuariosRelatedByIdUserModified !== null && $this->aCiUsuariosRelatedByIdUserModified->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdUserModified = null;
        }

        return $this;
    } // setIdUserModified()

    /**
     * Set the value of [id_user_created] column.
     *
     * @param int $v new value
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[HbfSesionesTableMap::COL_ID_USER_CREATED] = true;
        }

        if ($this->aCiUsuariosRelatedByIdUserCreated !== null && $this->aCiUsuariosRelatedByIdUserCreated->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdUserCreated = null;
        }

        return $this;
    } // setIdUserCreated()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfSesionesTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfSesionesTableMap::COL_DATE_CREATED] = true;
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
            if ($this->detalle !== '') {
                return false;
            }

            if ($this->observaciones !== '') {
                return false;
            }

            if ($this->estado !== 'ENABLED') {
                return false;
            }

            if ($this->change_count !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : HbfSesionesTableMap::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sesion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : HbfSesionesTableMap::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_club = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : HbfSesionesTableMap::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_turno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : HbfSesionesTableMap::translateFieldName('IdAsociado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_asociado = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : HbfSesionesTableMap::translateFieldName('Detalle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->detalle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : HbfSesionesTableMap::translateFieldName('CajaInicial', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caja_inicial = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : HbfSesionesTableMap::translateFieldName('CajaFinal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caja_final = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : HbfSesionesTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : HbfSesionesTableMap::translateFieldName('NumConsumos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->num_consumos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : HbfSesionesTableMap::translateFieldName('TotalIngresos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_ingresos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : HbfSesionesTableMap::translateFieldName('TotalEgresos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_egresos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : HbfSesionesTableMap::translateFieldName('TotalDeben', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_deben = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : HbfSesionesTableMap::translateFieldName('TotalSobra', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_sobra = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : HbfSesionesTableMap::translateFieldName('TotalFalta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_falta = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : HbfSesionesTableMap::translateFieldName('SobreRojo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sobre_rojo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : HbfSesionesTableMap::translateFieldName('SobreVerde', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sobre_verde = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : HbfSesionesTableMap::translateFieldName('Deposito', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deposito = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : HbfSesionesTableMap::translateFieldName('Cerrado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cerrado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : HbfSesionesTableMap::translateFieldName('Observaciones', TableMap::TYPE_PHPNAME, $indexType)];
            $this->observaciones = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : HbfSesionesTableMap::translateFieldName('FecSesion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->fec_sesion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : HbfSesionesTableMap::translateFieldName('IdOpcionSesion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_opcion_sesion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : HbfSesionesTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : HbfSesionesTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : HbfSesionesTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : HbfSesionesTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : HbfSesionesTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : HbfSesionesTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 27; // 27 = HbfSesionesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\HbfSesiones'), 0, $e);
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
        if ($this->aHbfClubs !== null && $this->id_club !== $this->aHbfClubs->getIdClub()) {
            $this->aHbfClubs = null;
        }
        if ($this->aHbfTurnos !== null && $this->id_turno !== $this->aHbfTurnos->getIdTurno()) {
            $this->aHbfTurnos = null;
        }
        if ($this->aCiUsuariosRelatedByIdAsociado !== null && $this->id_asociado !== $this->aCiUsuariosRelatedByIdAsociado->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdAsociado = null;
        }
        if ($this->aCiOptions !== null && $this->id_opcion_sesion !== $this->aCiOptions->getIdOption()) {
            $this->aCiOptions = null;
        }
        if ($this->aCiUsuariosRelatedByIdUserModified !== null && $this->id_user_modified !== $this->aCiUsuariosRelatedByIdUserModified->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdUserModified = null;
        }
        if ($this->aCiUsuariosRelatedByIdUserCreated !== null && $this->id_user_created !== $this->aCiUsuariosRelatedByIdUserCreated->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdUserCreated = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(HbfSesionesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildHbfSesionesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aHbfClubs = null;
            $this->aCiUsuariosRelatedByIdAsociado = null;
            $this->aHbfTurnos = null;
            $this->aCiOptions = null;
            $this->collCiSessionss = null;

            $this->collCiUsuariossRelatedByIdSesion = null;

            $this->collHbfComandass = null;

            $this->collHbfEgresoss = null;

            $this->collHbfPrepagoss = null;

            $this->collHbfVentass = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see HbfSesiones::setDeleted()
     * @see HbfSesiones::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfSesionesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildHbfSesionesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfSesionesTableMap::DATABASE_NAME);
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
                HbfSesionesTableMap::addInstanceToPool($this);
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

            if ($this->aCiUsuariosRelatedByIdUserCreated !== null) {
                if ($this->aCiUsuariosRelatedByIdUserCreated->isModified() || $this->aCiUsuariosRelatedByIdUserCreated->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByIdUserCreated->save($con);
                }
                $this->setCiUsuariosRelatedByIdUserCreated($this->aCiUsuariosRelatedByIdUserCreated);
            }

            if ($this->aCiUsuariosRelatedByIdUserModified !== null) {
                if ($this->aCiUsuariosRelatedByIdUserModified->isModified() || $this->aCiUsuariosRelatedByIdUserModified->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByIdUserModified->save($con);
                }
                $this->setCiUsuariosRelatedByIdUserModified($this->aCiUsuariosRelatedByIdUserModified);
            }

            if ($this->aHbfClubs !== null) {
                if ($this->aHbfClubs->isModified() || $this->aHbfClubs->isNew()) {
                    $affectedRows += $this->aHbfClubs->save($con);
                }
                $this->setHbfClubs($this->aHbfClubs);
            }

            if ($this->aCiUsuariosRelatedByIdAsociado !== null) {
                if ($this->aCiUsuariosRelatedByIdAsociado->isModified() || $this->aCiUsuariosRelatedByIdAsociado->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByIdAsociado->save($con);
                }
                $this->setCiUsuariosRelatedByIdAsociado($this->aCiUsuariosRelatedByIdAsociado);
            }

            if ($this->aHbfTurnos !== null) {
                if ($this->aHbfTurnos->isModified() || $this->aHbfTurnos->isNew()) {
                    $affectedRows += $this->aHbfTurnos->save($con);
                }
                $this->setHbfTurnos($this->aHbfTurnos);
            }

            if ($this->aCiOptions !== null) {
                if ($this->aCiOptions->isModified() || $this->aCiOptions->isNew()) {
                    $affectedRows += $this->aCiOptions->save($con);
                }
                $this->setCiOptions($this->aCiOptions);
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

            if ($this->ciUsuariossRelatedByIdSesionScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdSesionScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdSesionScheduledForDeletion as $ciUsuariosRelatedByIdSesion) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdSesion->save($con);
                    }
                    $this->ciUsuariossRelatedByIdSesionScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdSesion !== null) {
                foreach ($this->collCiUsuariossRelatedByIdSesion as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfComandassScheduledForDeletion !== null) {
                if (!$this->hbfComandassScheduledForDeletion->isEmpty()) {
                    \HbfComandasQuery::create()
                        ->filterByPrimaryKeys($this->hbfComandassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfComandassScheduledForDeletion = null;
                }
            }

            if ($this->collHbfComandass !== null) {
                foreach ($this->collHbfComandass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfEgresossScheduledForDeletion !== null) {
                if (!$this->hbfEgresossScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfEgresossScheduledForDeletion as $hbfEgresos) {
                        // need to save related object because we set the relation to null
                        $hbfEgresos->save($con);
                    }
                    $this->hbfEgresossScheduledForDeletion = null;
                }
            }

            if ($this->collHbfEgresoss !== null) {
                foreach ($this->collHbfEgresoss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfPrepagossScheduledForDeletion !== null) {
                if (!$this->hbfPrepagossScheduledForDeletion->isEmpty()) {
                    \HbfPrepagosQuery::create()
                        ->filterByPrimaryKeys($this->hbfPrepagossScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfPrepagossScheduledForDeletion = null;
                }
            }

            if ($this->collHbfPrepagoss !== null) {
                foreach ($this->collHbfPrepagoss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfVentassScheduledForDeletion !== null) {
                if (!$this->hbfVentassScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfVentassScheduledForDeletion as $hbfVentas) {
                        // need to save related object because we set the relation to null
                        $hbfVentas->save($con);
                    }
                    $this->hbfVentassScheduledForDeletion = null;
                }
            }

            if ($this->collHbfVentass !== null) {
                foreach ($this->collHbfVentass as $referrerFK) {
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

        $this->modifiedColumns[HbfSesionesTableMap::COL_ID_SESION] = true;
        if (null !== $this->id_sesion) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HbfSesionesTableMap::COL_ID_SESION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_SESION)) {
            $modifiedColumns[':p' . $index++]  = 'id_sesion';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_CLUB)) {
            $modifiedColumns[':p' . $index++]  = 'id_club';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_TURNO)) {
            $modifiedColumns[':p' . $index++]  = 'id_turno';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_ASOCIADO)) {
            $modifiedColumns[':p' . $index++]  = 'id_asociado';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DETALLE)) {
            $modifiedColumns[':p' . $index++]  = 'detalle';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CAJA_INICIAL)) {
            $modifiedColumns[':p' . $index++]  = 'caja_inicial';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CAJA_FINAL)) {
            $modifiedColumns[':p' . $index++]  = 'caja_final';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_NUM_CONSUMOS)) {
            $modifiedColumns[':p' . $index++]  = 'num_consumos';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_INGRESOS)) {
            $modifiedColumns[':p' . $index++]  = 'total_ingresos';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_EGRESOS)) {
            $modifiedColumns[':p' . $index++]  = 'total_egresos';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_DEBEN)) {
            $modifiedColumns[':p' . $index++]  = 'total_deben';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_SOBRA)) {
            $modifiedColumns[':p' . $index++]  = 'total_sobra';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_FALTA)) {
            $modifiedColumns[':p' . $index++]  = 'total_falta';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_SOBRE_ROJO)) {
            $modifiedColumns[':p' . $index++]  = 'sobre_rojo';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_SOBRE_VERDE)) {
            $modifiedColumns[':p' . $index++]  = 'sobre_verde';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DEPOSITO)) {
            $modifiedColumns[':p' . $index++]  = 'deposito';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CERRADO)) {
            $modifiedColumns[':p' . $index++]  = 'cerrado';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_OBSERVACIONES)) {
            $modifiedColumns[':p' . $index++]  = 'observaciones';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_FEC_SESION)) {
            $modifiedColumns[':p' . $index++]  = 'fec_sesion';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_OPCION_SESION)) {
            $modifiedColumns[':p' . $index++]  = 'id_opcion_sesion';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO hbf_sesiones (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_sesion':
                        $stmt->bindValue($identifier, $this->id_sesion, PDO::PARAM_INT);
                        break;
                    case 'id_club':
                        $stmt->bindValue($identifier, $this->id_club, PDO::PARAM_INT);
                        break;
                    case 'id_turno':
                        $stmt->bindValue($identifier, $this->id_turno, PDO::PARAM_INT);
                        break;
                    case 'id_asociado':
                        $stmt->bindValue($identifier, $this->id_asociado, PDO::PARAM_INT);
                        break;
                    case 'detalle':
                        $stmt->bindValue($identifier, $this->detalle, PDO::PARAM_STR);
                        break;
                    case 'caja_inicial':
                        $stmt->bindValue($identifier, $this->caja_inicial, PDO::PARAM_STR);
                        break;
                    case 'caja_final':
                        $stmt->bindValue($identifier, $this->caja_final, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'num_consumos':
                        $stmt->bindValue($identifier, $this->num_consumos, PDO::PARAM_STR);
                        break;
                    case 'total_ingresos':
                        $stmt->bindValue($identifier, $this->total_ingresos, PDO::PARAM_STR);
                        break;
                    case 'total_egresos':
                        $stmt->bindValue($identifier, $this->total_egresos, PDO::PARAM_STR);
                        break;
                    case 'total_deben':
                        $stmt->bindValue($identifier, $this->total_deben, PDO::PARAM_STR);
                        break;
                    case 'total_sobra':
                        $stmt->bindValue($identifier, $this->total_sobra, PDO::PARAM_STR);
                        break;
                    case 'total_falta':
                        $stmt->bindValue($identifier, $this->total_falta, PDO::PARAM_STR);
                        break;
                    case 'sobre_rojo':
                        $stmt->bindValue($identifier, $this->sobre_rojo, PDO::PARAM_STR);
                        break;
                    case 'sobre_verde':
                        $stmt->bindValue($identifier, $this->sobre_verde, PDO::PARAM_STR);
                        break;
                    case 'deposito':
                        $stmt->bindValue($identifier, $this->deposito, PDO::PARAM_STR);
                        break;
                    case 'cerrado':
                        $stmt->bindValue($identifier, $this->cerrado, PDO::PARAM_STR);
                        break;
                    case 'observaciones':
                        $stmt->bindValue($identifier, $this->observaciones, PDO::PARAM_STR);
                        break;
                    case 'fec_sesion':
                        $stmt->bindValue($identifier, $this->fec_sesion ? $this->fec_sesion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'id_opcion_sesion':
                        $stmt->bindValue($identifier, $this->id_opcion_sesion, PDO::PARAM_INT);
                        break;
                    case 'estado':
                        $stmt->bindValue($identifier, $this->estado, PDO::PARAM_STR);
                        break;
                    case 'change_count':
                        $stmt->bindValue($identifier, $this->change_count, PDO::PARAM_INT);
                        break;
                    case 'id_user_modified':
                        $stmt->bindValue($identifier, $this->id_user_modified, PDO::PARAM_INT);
                        break;
                    case 'id_user_created':
                        $stmt->bindValue($identifier, $this->id_user_created, PDO::PARAM_INT);
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
        $this->setIdSesion($pk);

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
        $pos = HbfSesionesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSesion();
                break;
            case 1:
                return $this->getIdClub();
                break;
            case 2:
                return $this->getIdTurno();
                break;
            case 3:
                return $this->getIdAsociado();
                break;
            case 4:
                return $this->getDetalle();
                break;
            case 5:
                return $this->getCajaInicial();
                break;
            case 6:
                return $this->getCajaFinal();
                break;
            case 7:
                return $this->getTotal();
                break;
            case 8:
                return $this->getNumConsumos();
                break;
            case 9:
                return $this->getTotalIngresos();
                break;
            case 10:
                return $this->getTotalEgresos();
                break;
            case 11:
                return $this->getTotalDeben();
                break;
            case 12:
                return $this->getTotalSobra();
                break;
            case 13:
                return $this->getTotalFalta();
                break;
            case 14:
                return $this->getSobreRojo();
                break;
            case 15:
                return $this->getSobreVerde();
                break;
            case 16:
                return $this->getDeposito();
                break;
            case 17:
                return $this->getCerrado();
                break;
            case 18:
                return $this->getObservaciones();
                break;
            case 19:
                return $this->getFecSesion();
                break;
            case 20:
                return $this->getIdOpcionSesion();
                break;
            case 21:
                return $this->getEstado();
                break;
            case 22:
                return $this->getChangeCount();
                break;
            case 23:
                return $this->getIdUserModified();
                break;
            case 24:
                return $this->getIdUserCreated();
                break;
            case 25:
                return $this->getDateModified();
                break;
            case 26:
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

        if (isset($alreadyDumpedObjects['HbfSesiones'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['HbfSesiones'][$this->hashCode()] = true;
        $keys = HbfSesionesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSesion(),
            $keys[1] => $this->getIdClub(),
            $keys[2] => $this->getIdTurno(),
            $keys[3] => $this->getIdAsociado(),
            $keys[4] => $this->getDetalle(),
            $keys[5] => $this->getCajaInicial(),
            $keys[6] => $this->getCajaFinal(),
            $keys[7] => $this->getTotal(),
            $keys[8] => $this->getNumConsumos(),
            $keys[9] => $this->getTotalIngresos(),
            $keys[10] => $this->getTotalEgresos(),
            $keys[11] => $this->getTotalDeben(),
            $keys[12] => $this->getTotalSobra(),
            $keys[13] => $this->getTotalFalta(),
            $keys[14] => $this->getSobreRojo(),
            $keys[15] => $this->getSobreVerde(),
            $keys[16] => $this->getDeposito(),
            $keys[17] => $this->getCerrado(),
            $keys[18] => $this->getObservaciones(),
            $keys[19] => $this->getFecSesion(),
            $keys[20] => $this->getIdOpcionSesion(),
            $keys[21] => $this->getEstado(),
            $keys[22] => $this->getChangeCount(),
            $keys[23] => $this->getIdUserModified(),
            $keys[24] => $this->getIdUserCreated(),
            $keys[25] => $this->getDateModified(),
            $keys[26] => $this->getDateCreated(),
        );
        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[25]] instanceof \DateTimeInterface) {
            $result[$keys[25]] = $result[$keys[25]]->format('c');
        }

        if ($result[$keys[26]] instanceof \DateTimeInterface) {
            $result[$keys[26]] = $result[$keys[26]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {

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

                $result[$key] = $this->aCiUsuariosRelatedByIdUserCreated->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiUsuariosRelatedByIdUserModified) {

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

                $result[$key] = $this->aCiUsuariosRelatedByIdUserModified->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aHbfClubs) {

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

                $result[$key] = $this->aHbfClubs->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiUsuariosRelatedByIdAsociado) {

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

                $result[$key] = $this->aCiUsuariosRelatedByIdAsociado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aHbfTurnos) {

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

                $result[$key] = $this->aHbfTurnos->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiOptions) {

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

                $result[$key] = $this->aCiOptions->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collCiUsuariossRelatedByIdSesion) {

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

                $result[$key] = $this->collCiUsuariossRelatedByIdSesion->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfComandass) {

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

                $result[$key] = $this->collHbfComandass->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfEgresoss) {

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

                $result[$key] = $this->collHbfEgresoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfPrepagoss) {

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

                $result[$key] = $this->collHbfPrepagoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfVentass) {

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

                $result[$key] = $this->collHbfVentass->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\HbfSesiones
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = HbfSesionesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\HbfSesiones
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdSesion($value);
                break;
            case 1:
                $this->setIdClub($value);
                break;
            case 2:
                $this->setIdTurno($value);
                break;
            case 3:
                $this->setIdAsociado($value);
                break;
            case 4:
                $this->setDetalle($value);
                break;
            case 5:
                $this->setCajaInicial($value);
                break;
            case 6:
                $this->setCajaFinal($value);
                break;
            case 7:
                $this->setTotal($value);
                break;
            case 8:
                $this->setNumConsumos($value);
                break;
            case 9:
                $this->setTotalIngresos($value);
                break;
            case 10:
                $this->setTotalEgresos($value);
                break;
            case 11:
                $this->setTotalDeben($value);
                break;
            case 12:
                $this->setTotalSobra($value);
                break;
            case 13:
                $this->setTotalFalta($value);
                break;
            case 14:
                $this->setSobreRojo($value);
                break;
            case 15:
                $this->setSobreVerde($value);
                break;
            case 16:
                $this->setDeposito($value);
                break;
            case 17:
                $this->setCerrado($value);
                break;
            case 18:
                $this->setObservaciones($value);
                break;
            case 19:
                $this->setFecSesion($value);
                break;
            case 20:
                $this->setIdOpcionSesion($value);
                break;
            case 21:
                $this->setEstado($value);
                break;
            case 22:
                $this->setChangeCount($value);
                break;
            case 23:
                $this->setIdUserModified($value);
                break;
            case 24:
                $this->setIdUserCreated($value);
                break;
            case 25:
                $this->setDateModified($value);
                break;
            case 26:
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
        $keys = HbfSesionesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdSesion($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdClub($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdTurno($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdAsociado($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDetalle($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCajaInicial($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCajaFinal($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTotal($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setNumConsumos($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTotalIngresos($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTotalEgresos($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTotalDeben($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTotalSobra($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotalFalta($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSobreRojo($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setSobreVerde($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDeposito($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCerrado($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setObservaciones($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setFecSesion($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setIdOpcionSesion($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setEstado($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setChangeCount($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setIdUserModified($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setIdUserCreated($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setDateModified($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setDateCreated($arr[$keys[26]]);
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
     * @return $this|\HbfSesiones The current object, for fluid interface
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
        $criteria = new Criteria(HbfSesionesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_SESION)) {
            $criteria->add(HbfSesionesTableMap::COL_ID_SESION, $this->id_sesion);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_CLUB)) {
            $criteria->add(HbfSesionesTableMap::COL_ID_CLUB, $this->id_club);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_TURNO)) {
            $criteria->add(HbfSesionesTableMap::COL_ID_TURNO, $this->id_turno);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_ASOCIADO)) {
            $criteria->add(HbfSesionesTableMap::COL_ID_ASOCIADO, $this->id_asociado);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DETALLE)) {
            $criteria->add(HbfSesionesTableMap::COL_DETALLE, $this->detalle);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CAJA_INICIAL)) {
            $criteria->add(HbfSesionesTableMap::COL_CAJA_INICIAL, $this->caja_inicial);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CAJA_FINAL)) {
            $criteria->add(HbfSesionesTableMap::COL_CAJA_FINAL, $this->caja_final);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL)) {
            $criteria->add(HbfSesionesTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_NUM_CONSUMOS)) {
            $criteria->add(HbfSesionesTableMap::COL_NUM_CONSUMOS, $this->num_consumos);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_INGRESOS)) {
            $criteria->add(HbfSesionesTableMap::COL_TOTAL_INGRESOS, $this->total_ingresos);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_EGRESOS)) {
            $criteria->add(HbfSesionesTableMap::COL_TOTAL_EGRESOS, $this->total_egresos);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_DEBEN)) {
            $criteria->add(HbfSesionesTableMap::COL_TOTAL_DEBEN, $this->total_deben);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_SOBRA)) {
            $criteria->add(HbfSesionesTableMap::COL_TOTAL_SOBRA, $this->total_sobra);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_TOTAL_FALTA)) {
            $criteria->add(HbfSesionesTableMap::COL_TOTAL_FALTA, $this->total_falta);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_SOBRE_ROJO)) {
            $criteria->add(HbfSesionesTableMap::COL_SOBRE_ROJO, $this->sobre_rojo);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_SOBRE_VERDE)) {
            $criteria->add(HbfSesionesTableMap::COL_SOBRE_VERDE, $this->sobre_verde);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DEPOSITO)) {
            $criteria->add(HbfSesionesTableMap::COL_DEPOSITO, $this->deposito);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CERRADO)) {
            $criteria->add(HbfSesionesTableMap::COL_CERRADO, $this->cerrado);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_OBSERVACIONES)) {
            $criteria->add(HbfSesionesTableMap::COL_OBSERVACIONES, $this->observaciones);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_FEC_SESION)) {
            $criteria->add(HbfSesionesTableMap::COL_FEC_SESION, $this->fec_sesion);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_OPCION_SESION)) {
            $criteria->add(HbfSesionesTableMap::COL_ID_OPCION_SESION, $this->id_opcion_sesion);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ESTADO)) {
            $criteria->add(HbfSesionesTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(HbfSesionesTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(HbfSesionesTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(HbfSesionesTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(HbfSesionesTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(HbfSesionesTableMap::COL_DATE_CREATED)) {
            $criteria->add(HbfSesionesTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildHbfSesionesQuery::create();
        $criteria->add(HbfSesionesTableMap::COL_ID_SESION, $this->id_sesion);

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
        $validPk = null !== $this->getIdSesion();

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
        return $this->getIdSesion();
    }

    /**
     * Generic method to set the primary key (id_sesion column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSesion($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdSesion();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HbfSesiones (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdClub($this->getIdClub());
        $copyObj->setIdTurno($this->getIdTurno());
        $copyObj->setIdAsociado($this->getIdAsociado());
        $copyObj->setDetalle($this->getDetalle());
        $copyObj->setCajaInicial($this->getCajaInicial());
        $copyObj->setCajaFinal($this->getCajaFinal());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setNumConsumos($this->getNumConsumos());
        $copyObj->setTotalIngresos($this->getTotalIngresos());
        $copyObj->setTotalEgresos($this->getTotalEgresos());
        $copyObj->setTotalDeben($this->getTotalDeben());
        $copyObj->setTotalSobra($this->getTotalSobra());
        $copyObj->setTotalFalta($this->getTotalFalta());
        $copyObj->setSobreRojo($this->getSobreRojo());
        $copyObj->setSobreVerde($this->getSobreVerde());
        $copyObj->setDeposito($this->getDeposito());
        $copyObj->setCerrado($this->getCerrado());
        $copyObj->setObservaciones($this->getObservaciones());
        $copyObj->setFecSesion($this->getFecSesion());
        $copyObj->setIdOpcionSesion($this->getIdOpcionSesion());
        $copyObj->setEstado($this->getEstado());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCiSessionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiSessions($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdSesion() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdSesion($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfComandass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfComandas($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfEgresoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfEgresos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfPrepagoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPrepagos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfVentass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfVentas($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSesion(NULL); // this is a auto-increment column, so set to default value
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
     * @return \HbfSesiones Clone of current object.
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
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfSesiones The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiUsuariosRelatedByIdUserCreated(ChildCiUsuarios $v = null)
    {
        if ($v === null) {
            $this->setIdUserCreated(NULL);
        } else {
            $this->setIdUserCreated($v->getIdUsuario());
        }

        $this->aCiUsuariosRelatedByIdUserCreated = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiUsuarios object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfSesionesRelatedByIdUserCreated($this);
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
    public function getCiUsuariosRelatedByIdUserCreated(ConnectionInterface $con = null)
    {
        if ($this->aCiUsuariosRelatedByIdUserCreated === null && ($this->id_user_created != 0)) {
            $this->aCiUsuariosRelatedByIdUserCreated = ChildCiUsuariosQuery::create()->findPk($this->id_user_created, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiUsuariosRelatedByIdUserCreated->addHbfSesionessRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfSesiones The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiUsuariosRelatedByIdUserModified(ChildCiUsuarios $v = null)
    {
        if ($v === null) {
            $this->setIdUserModified(NULL);
        } else {
            $this->setIdUserModified($v->getIdUsuario());
        }

        $this->aCiUsuariosRelatedByIdUserModified = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiUsuarios object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfSesionesRelatedByIdUserModified($this);
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
    public function getCiUsuariosRelatedByIdUserModified(ConnectionInterface $con = null)
    {
        if ($this->aCiUsuariosRelatedByIdUserModified === null && ($this->id_user_modified != 0)) {
            $this->aCiUsuariosRelatedByIdUserModified = ChildCiUsuariosQuery::create()->findPk($this->id_user_modified, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiUsuariosRelatedByIdUserModified->addHbfSesionessRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildHbfClubs object.
     *
     * @param  ChildHbfClubs $v
     * @return $this|\HbfSesiones The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfClubs(ChildHbfClubs $v = null)
    {
        if ($v === null) {
            $this->setIdClub(NULL);
        } else {
            $this->setIdClub($v->getIdClub());
        }

        $this->aHbfClubs = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfClubs object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfSesiones($this);
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
    public function getHbfClubs(ConnectionInterface $con = null)
    {
        if ($this->aHbfClubs === null && ($this->id_club != 0)) {
            $this->aHbfClubs = ChildHbfClubsQuery::create()->findPk($this->id_club, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfClubs->addHbfSesioness($this);
             */
        }

        return $this->aHbfClubs;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfSesiones The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiUsuariosRelatedByIdAsociado(ChildCiUsuarios $v = null)
    {
        if ($v === null) {
            $this->setIdAsociado(NULL);
        } else {
            $this->setIdAsociado($v->getIdUsuario());
        }

        $this->aCiUsuariosRelatedByIdAsociado = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiUsuarios object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfSesionesRelatedByIdAsociado($this);
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
    public function getCiUsuariosRelatedByIdAsociado(ConnectionInterface $con = null)
    {
        if ($this->aCiUsuariosRelatedByIdAsociado === null && ($this->id_asociado != 0)) {
            $this->aCiUsuariosRelatedByIdAsociado = ChildCiUsuariosQuery::create()->findPk($this->id_asociado, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiUsuariosRelatedByIdAsociado->addHbfSesionessRelatedByIdAsociado($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdAsociado;
    }

    /**
     * Declares an association between this object and a ChildHbfTurnos object.
     *
     * @param  ChildHbfTurnos $v
     * @return $this|\HbfSesiones The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfTurnos(ChildHbfTurnos $v = null)
    {
        if ($v === null) {
            $this->setIdTurno(NULL);
        } else {
            $this->setIdTurno($v->getIdTurno());
        }

        $this->aHbfTurnos = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfTurnos object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfSesiones($this);
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
    public function getHbfTurnos(ConnectionInterface $con = null)
    {
        if ($this->aHbfTurnos === null && ($this->id_turno != 0)) {
            $this->aHbfTurnos = ChildHbfTurnosQuery::create()->findPk($this->id_turno, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfTurnos->addHbfSesioness($this);
             */
        }

        return $this->aHbfTurnos;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\HbfSesiones The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptions(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOpcionSesion(NULL);
        } else {
            $this->setIdOpcionSesion($v->getIdOption());
        }

        $this->aCiOptions = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfSesiones($this);
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
    public function getCiOptions(ConnectionInterface $con = null)
    {
        if ($this->aCiOptions === null && ($this->id_opcion_sesion != 0)) {
            $this->aCiOptions = ChildCiOptionsQuery::create()->findPk($this->id_opcion_sesion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptions->addHbfSesioness($this);
             */
        }

        return $this->aCiOptions;
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
        if ('CiSessions' == $relationName) {
            $this->initCiSessionss();
            return;
        }
        if ('CiUsuariosRelatedByIdSesion' == $relationName) {
            $this->initCiUsuariossRelatedByIdSesion();
            return;
        }
        if ('HbfComandas' == $relationName) {
            $this->initHbfComandass();
            return;
        }
        if ('HbfEgresos' == $relationName) {
            $this->initHbfEgresoss();
            return;
        }
        if ('HbfPrepagos' == $relationName) {
            $this->initHbfPrepagoss();
            return;
        }
        if ('HbfVentas' == $relationName) {
            $this->initHbfVentass();
            return;
        }
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
     * If this ChildHbfSesiones is new, it will return
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
                    ->filterByHbfSesiones($this)
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
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function setCiSessionss(Collection $ciSessionss, ConnectionInterface $con = null)
    {
        /** @var ChildCiSessions[] $ciSessionssToDelete */
        $ciSessionssToDelete = $this->getCiSessionss(new Criteria(), $con)->diff($ciSessionss);


        $this->ciSessionssScheduledForDeletion = $ciSessionssToDelete;

        foreach ($ciSessionssToDelete as $ciSessionsRemoved) {
            $ciSessionsRemoved->setHbfSesiones(null);
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
                ->filterByHbfSesiones($this)
                ->count($con);
        }

        return count($this->collCiSessionss);
    }

    /**
     * Method called to associate a ChildCiSessions object to this object
     * through the ChildCiSessions foreign key attribute.
     *
     * @param  ChildCiSessions $l ChildCiSessions
     * @return $this|\HbfSesiones The current object (for fluent API support)
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
        $ciSessions->setHbfSesiones($this);
    }

    /**
     * @param  ChildCiSessions $ciSessions The ChildCiSessions object to remove.
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
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
            $ciSessions->setHbfSesiones(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiSessionss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiSessions[] List of ChildCiSessions objects
     */
    public function getCiSessionssJoinCiUsuarios(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiSessionsQuery::create(null, $criteria);
        $query->joinWith('CiUsuarios', $joinBehavior);

        return $this->getCiSessionss($query, $con);
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdSesion collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdSesion()
     */
    public function clearCiUsuariossRelatedByIdSesion()
    {
        $this->collCiUsuariossRelatedByIdSesion = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdSesion collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdSesion($v = true)
    {
        $this->collCiUsuariossRelatedByIdSesionPartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdSesion collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdSesion collection to an empty array (like clearcollCiUsuariossRelatedByIdSesion());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdSesion($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdSesion && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdSesion = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdSesion->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfSesiones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdSesionPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdSesion || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdSesion) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdSesion();
            } else {
                $collCiUsuariossRelatedByIdSesion = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByHbfSesionesRelatedByIdSesion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdSesionPartial && count($collCiUsuariossRelatedByIdSesion)) {
                        $this->initCiUsuariossRelatedByIdSesion(false);

                        foreach ($collCiUsuariossRelatedByIdSesion as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdSesion->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdSesion->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdSesionPartial = true;
                    }

                    return $collCiUsuariossRelatedByIdSesion;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdSesion) {
                    foreach ($this->collCiUsuariossRelatedByIdSesion as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdSesion[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdSesion = $collCiUsuariossRelatedByIdSesion;
                $this->collCiUsuariossRelatedByIdSesionPartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdSesion;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdSesion A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdSesion(Collection $ciUsuariossRelatedByIdSesion, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdSesionToDelete */
        $ciUsuariossRelatedByIdSesionToDelete = $this->getCiUsuariossRelatedByIdSesion(new Criteria(), $con)->diff($ciUsuariossRelatedByIdSesion);


        $this->ciUsuariossRelatedByIdSesionScheduledForDeletion = $ciUsuariossRelatedByIdSesionToDelete;

        foreach ($ciUsuariossRelatedByIdSesionToDelete as $ciUsuariosRelatedByIdSesionRemoved) {
            $ciUsuariosRelatedByIdSesionRemoved->setHbfSesionesRelatedByIdSesion(null);
        }

        $this->collCiUsuariossRelatedByIdSesion = null;
        foreach ($ciUsuariossRelatedByIdSesion as $ciUsuariosRelatedByIdSesion) {
            $this->addCiUsuariosRelatedByIdSesion($ciUsuariosRelatedByIdSesion);
        }

        $this->collCiUsuariossRelatedByIdSesion = $ciUsuariossRelatedByIdSesion;
        $this->collCiUsuariossRelatedByIdSesionPartial = false;

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
    public function countCiUsuariossRelatedByIdSesion(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdSesionPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdSesion || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdSesion) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdSesion());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfSesionesRelatedByIdSesion($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdSesion);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdSesion(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdSesion === null) {
            $this->initCiUsuariossRelatedByIdSesion();
            $this->collCiUsuariossRelatedByIdSesionPartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdSesion->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdSesion($l);

            if ($this->ciUsuariossRelatedByIdSesionScheduledForDeletion and $this->ciUsuariossRelatedByIdSesionScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdSesionScheduledForDeletion->remove($this->ciUsuariossRelatedByIdSesionScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdSesion The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdSesion(ChildCiUsuarios $ciUsuariosRelatedByIdSesion)
    {
        $this->collCiUsuariossRelatedByIdSesion[]= $ciUsuariosRelatedByIdSesion;
        $ciUsuariosRelatedByIdSesion->setHbfSesionesRelatedByIdSesion($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdSesion The ChildCiUsuarios object to remove.
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdSesion(ChildCiUsuarios $ciUsuariosRelatedByIdSesion)
    {
        if ($this->getCiUsuariossRelatedByIdSesion()->contains($ciUsuariosRelatedByIdSesion)) {
            $pos = $this->collCiUsuariossRelatedByIdSesion->search($ciUsuariosRelatedByIdSesion);
            $this->collCiUsuariossRelatedByIdSesion->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdSesionScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdSesionScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdSesion;
                $this->ciUsuariossRelatedByIdSesionScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdSesionScheduledForDeletion[]= $ciUsuariosRelatedByIdSesion;
            $ciUsuariosRelatedByIdSesion->setHbfSesionesRelatedByIdSesion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdSesion from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdSesionJoinCiOptionsRelatedByIdOptionTipoAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionTipoAsociado', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdSesion($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdSesion from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdSesionJoinCiOptionsRelatedByIdOptionNivelAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionNivelAsociado', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdSesion($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdSesion from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdSesionJoinCiUsuariosRelatedByInvitadoPor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByInvitadoPor', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdSesion($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdSesion from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdSesionJoinCiOptionsRelatedByIdOpcionRole(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOpcionRole', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdSesion($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdSesion from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdSesionJoinHbfTurnosRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnosRelatedByIdTurno', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdSesion($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdSesion from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdSesionJoinCiOptionsRelatedByIdTipoUsuario(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdTipoUsuario', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdSesion($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdSesion from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdSesionJoinHbfClubsRelatedByIdClub(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfClubsRelatedByIdClub', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdSesion($query, $con);
    }

    /**
     * Clears out the collHbfComandass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfComandass()
     */
    public function clearHbfComandass()
    {
        $this->collHbfComandass = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfComandass collection loaded partially.
     */
    public function resetPartialHbfComandass($v = true)
    {
        $this->collHbfComandassPartial = $v;
    }

    /**
     * Initializes the collHbfComandass collection.
     *
     * By default this just sets the collHbfComandass collection to an empty array (like clearcollHbfComandass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfComandass($overrideExisting = true)
    {
        if (null !== $this->collHbfComandass && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfComandasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfComandass = new $collectionClassName;
        $this->collHbfComandass->setModel('\HbfComandas');
    }

    /**
     * Gets an array of ChildHbfComandas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfSesiones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     * @throws PropelException
     */
    public function getHbfComandass(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassPartial && !$this->isNew();
        if (null === $this->collHbfComandass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfComandass) {
                // return empty collection
                $this->initHbfComandass();
            } else {
                $collHbfComandass = ChildHbfComandasQuery::create(null, $criteria)
                    ->filterByHbfSesiones($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfComandassPartial && count($collHbfComandass)) {
                        $this->initHbfComandass(false);

                        foreach ($collHbfComandass as $obj) {
                            if (false == $this->collHbfComandass->contains($obj)) {
                                $this->collHbfComandass->append($obj);
                            }
                        }

                        $this->collHbfComandassPartial = true;
                    }

                    return $collHbfComandass;
                }

                if ($partial && $this->collHbfComandass) {
                    foreach ($this->collHbfComandass as $obj) {
                        if ($obj->isNew()) {
                            $collHbfComandass[] = $obj;
                        }
                    }
                }

                $this->collHbfComandass = $collHbfComandass;
                $this->collHbfComandassPartial = false;
            }
        }

        return $this->collHbfComandass;
    }

    /**
     * Sets a collection of ChildHbfComandas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfComandass A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function setHbfComandass(Collection $hbfComandass, ConnectionInterface $con = null)
    {
        /** @var ChildHbfComandas[] $hbfComandassToDelete */
        $hbfComandassToDelete = $this->getHbfComandass(new Criteria(), $con)->diff($hbfComandass);


        $this->hbfComandassScheduledForDeletion = $hbfComandassToDelete;

        foreach ($hbfComandassToDelete as $hbfComandasRemoved) {
            $hbfComandasRemoved->setHbfSesiones(null);
        }

        $this->collHbfComandass = null;
        foreach ($hbfComandass as $hbfComandas) {
            $this->addHbfComandas($hbfComandas);
        }

        $this->collHbfComandass = $hbfComandass;
        $this->collHbfComandassPartial = false;

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
    public function countHbfComandass(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfComandassPartial && !$this->isNew();
        if (null === $this->collHbfComandass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfComandass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfComandass());
            }

            $query = ChildHbfComandasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfSesiones($this)
                ->count($con);
        }

        return count($this->collHbfComandass);
    }

    /**
     * Method called to associate a ChildHbfComandas object to this object
     * through the ChildHbfComandas foreign key attribute.
     *
     * @param  ChildHbfComandas $l ChildHbfComandas
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function addHbfComandas(ChildHbfComandas $l)
    {
        if ($this->collHbfComandass === null) {
            $this->initHbfComandass();
            $this->collHbfComandassPartial = true;
        }

        if (!$this->collHbfComandass->contains($l)) {
            $this->doAddHbfComandas($l);

            if ($this->hbfComandassScheduledForDeletion and $this->hbfComandassScheduledForDeletion->contains($l)) {
                $this->hbfComandassScheduledForDeletion->remove($this->hbfComandassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfComandas $hbfComandas The ChildHbfComandas object to add.
     */
    protected function doAddHbfComandas(ChildHbfComandas $hbfComandas)
    {
        $this->collHbfComandass[]= $hbfComandas;
        $hbfComandas->setHbfSesiones($this);
    }

    /**
     * @param  ChildHbfComandas $hbfComandas The ChildHbfComandas object to remove.
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function removeHbfComandas(ChildHbfComandas $hbfComandas)
    {
        if ($this->getHbfComandass()->contains($hbfComandas)) {
            $pos = $this->collHbfComandass->search($hbfComandas);
            $this->collHbfComandass->remove($pos);
            if (null === $this->hbfComandassScheduledForDeletion) {
                $this->hbfComandassScheduledForDeletion = clone $this->collHbfComandass;
                $this->hbfComandassScheduledForDeletion->clear();
            }
            $this->hbfComandassScheduledForDeletion[]= clone $hbfComandas;
            $hbfComandas->setHbfSesiones(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfComandass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfComandass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfComandass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfComandass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassJoinCiUsuariosRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdCliente', $joinBehavior);

        return $this->getHbfComandass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfComandass($query, $con);
    }

    /**
     * Clears out the collHbfEgresoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfEgresoss()
     */
    public function clearHbfEgresoss()
    {
        $this->collHbfEgresoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfEgresoss collection loaded partially.
     */
    public function resetPartialHbfEgresoss($v = true)
    {
        $this->collHbfEgresossPartial = $v;
    }

    /**
     * Initializes the collHbfEgresoss collection.
     *
     * By default this just sets the collHbfEgresoss collection to an empty array (like clearcollHbfEgresoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfEgresoss($overrideExisting = true)
    {
        if (null !== $this->collHbfEgresoss && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfEgresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfEgresoss = new $collectionClassName;
        $this->collHbfEgresoss->setModel('\HbfEgresos');
    }

    /**
     * Gets an array of ChildHbfEgresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfSesiones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     * @throws PropelException
     */
    public function getHbfEgresoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossPartial && !$this->isNew();
        if (null === $this->collHbfEgresoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresoss) {
                // return empty collection
                $this->initHbfEgresoss();
            } else {
                $collHbfEgresoss = ChildHbfEgresosQuery::create(null, $criteria)
                    ->filterByHbfSesiones($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfEgresossPartial && count($collHbfEgresoss)) {
                        $this->initHbfEgresoss(false);

                        foreach ($collHbfEgresoss as $obj) {
                            if (false == $this->collHbfEgresoss->contains($obj)) {
                                $this->collHbfEgresoss->append($obj);
                            }
                        }

                        $this->collHbfEgresossPartial = true;
                    }

                    return $collHbfEgresoss;
                }

                if ($partial && $this->collHbfEgresoss) {
                    foreach ($this->collHbfEgresoss as $obj) {
                        if ($obj->isNew()) {
                            $collHbfEgresoss[] = $obj;
                        }
                    }
                }

                $this->collHbfEgresoss = $collHbfEgresoss;
                $this->collHbfEgresossPartial = false;
            }
        }

        return $this->collHbfEgresoss;
    }

    /**
     * Sets a collection of ChildHbfEgresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfEgresoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function setHbfEgresoss(Collection $hbfEgresoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfEgresos[] $hbfEgresossToDelete */
        $hbfEgresossToDelete = $this->getHbfEgresoss(new Criteria(), $con)->diff($hbfEgresoss);


        $this->hbfEgresossScheduledForDeletion = $hbfEgresossToDelete;

        foreach ($hbfEgresossToDelete as $hbfEgresosRemoved) {
            $hbfEgresosRemoved->setHbfSesiones(null);
        }

        $this->collHbfEgresoss = null;
        foreach ($hbfEgresoss as $hbfEgresos) {
            $this->addHbfEgresos($hbfEgresos);
        }

        $this->collHbfEgresoss = $hbfEgresoss;
        $this->collHbfEgresossPartial = false;

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
    public function countHbfEgresoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfEgresossPartial && !$this->isNew();
        if (null === $this->collHbfEgresoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfEgresoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfEgresoss());
            }

            $query = ChildHbfEgresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfSesiones($this)
                ->count($con);
        }

        return count($this->collHbfEgresoss);
    }

    /**
     * Method called to associate a ChildHbfEgresos object to this object
     * through the ChildHbfEgresos foreign key attribute.
     *
     * @param  ChildHbfEgresos $l ChildHbfEgresos
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function addHbfEgresos(ChildHbfEgresos $l)
    {
        if ($this->collHbfEgresoss === null) {
            $this->initHbfEgresoss();
            $this->collHbfEgresossPartial = true;
        }

        if (!$this->collHbfEgresoss->contains($l)) {
            $this->doAddHbfEgresos($l);

            if ($this->hbfEgresossScheduledForDeletion and $this->hbfEgresossScheduledForDeletion->contains($l)) {
                $this->hbfEgresossScheduledForDeletion->remove($this->hbfEgresossScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfEgresos $hbfEgresos The ChildHbfEgresos object to add.
     */
    protected function doAddHbfEgresos(ChildHbfEgresos $hbfEgresos)
    {
        $this->collHbfEgresoss[]= $hbfEgresos;
        $hbfEgresos->setHbfSesiones($this);
    }

    /**
     * @param  ChildHbfEgresos $hbfEgresos The ChildHbfEgresos object to remove.
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function removeHbfEgresos(ChildHbfEgresos $hbfEgresos)
    {
        if ($this->getHbfEgresoss()->contains($hbfEgresos)) {
            $pos = $this->collHbfEgresoss->search($hbfEgresos);
            $this->collHbfEgresoss->remove($pos);
            if (null === $this->hbfEgresossScheduledForDeletion) {
                $this->hbfEgresossScheduledForDeletion = clone $this->collHbfEgresoss;
                $this->hbfEgresossScheduledForDeletion->clear();
            }
            $this->hbfEgresossScheduledForDeletion[]= $hbfEgresos;
            $hbfEgresos->setHbfSesiones(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfEgresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfEgresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossJoinCiUsuariosRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdCliente', $joinBehavior);

        return $this->getHbfEgresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfEgresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfEgresoss($query, $con);
    }

    /**
     * Clears out the collHbfPrepagoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfPrepagoss()
     */
    public function clearHbfPrepagoss()
    {
        $this->collHbfPrepagoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfPrepagoss collection loaded partially.
     */
    public function resetPartialHbfPrepagoss($v = true)
    {
        $this->collHbfPrepagossPartial = $v;
    }

    /**
     * Initializes the collHbfPrepagoss collection.
     *
     * By default this just sets the collHbfPrepagoss collection to an empty array (like clearcollHbfPrepagoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfPrepagoss($overrideExisting = true)
    {
        if (null !== $this->collHbfPrepagoss && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfPrepagosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfPrepagoss = new $collectionClassName;
        $this->collHbfPrepagoss->setModel('\HbfPrepagos');
    }

    /**
     * Gets an array of ChildHbfPrepagos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfSesiones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     * @throws PropelException
     */
    public function getHbfPrepagoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossPartial && !$this->isNew();
        if (null === $this->collHbfPrepagoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagoss) {
                // return empty collection
                $this->initHbfPrepagoss();
            } else {
                $collHbfPrepagoss = ChildHbfPrepagosQuery::create(null, $criteria)
                    ->filterByHbfSesiones($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfPrepagossPartial && count($collHbfPrepagoss)) {
                        $this->initHbfPrepagoss(false);

                        foreach ($collHbfPrepagoss as $obj) {
                            if (false == $this->collHbfPrepagoss->contains($obj)) {
                                $this->collHbfPrepagoss->append($obj);
                            }
                        }

                        $this->collHbfPrepagossPartial = true;
                    }

                    return $collHbfPrepagoss;
                }

                if ($partial && $this->collHbfPrepagoss) {
                    foreach ($this->collHbfPrepagoss as $obj) {
                        if ($obj->isNew()) {
                            $collHbfPrepagoss[] = $obj;
                        }
                    }
                }

                $this->collHbfPrepagoss = $collHbfPrepagoss;
                $this->collHbfPrepagossPartial = false;
            }
        }

        return $this->collHbfPrepagoss;
    }

    /**
     * Sets a collection of ChildHbfPrepagos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfPrepagoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function setHbfPrepagoss(Collection $hbfPrepagoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPrepagos[] $hbfPrepagossToDelete */
        $hbfPrepagossToDelete = $this->getHbfPrepagoss(new Criteria(), $con)->diff($hbfPrepagoss);


        $this->hbfPrepagossScheduledForDeletion = $hbfPrepagossToDelete;

        foreach ($hbfPrepagossToDelete as $hbfPrepagosRemoved) {
            $hbfPrepagosRemoved->setHbfSesiones(null);
        }

        $this->collHbfPrepagoss = null;
        foreach ($hbfPrepagoss as $hbfPrepagos) {
            $this->addHbfPrepagos($hbfPrepagos);
        }

        $this->collHbfPrepagoss = $hbfPrepagoss;
        $this->collHbfPrepagossPartial = false;

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
    public function countHbfPrepagoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPrepagossPartial && !$this->isNew();
        if (null === $this->collHbfPrepagoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfPrepagoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfPrepagoss());
            }

            $query = ChildHbfPrepagosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfSesiones($this)
                ->count($con);
        }

        return count($this->collHbfPrepagoss);
    }

    /**
     * Method called to associate a ChildHbfPrepagos object to this object
     * through the ChildHbfPrepagos foreign key attribute.
     *
     * @param  ChildHbfPrepagos $l ChildHbfPrepagos
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function addHbfPrepagos(ChildHbfPrepagos $l)
    {
        if ($this->collHbfPrepagoss === null) {
            $this->initHbfPrepagoss();
            $this->collHbfPrepagossPartial = true;
        }

        if (!$this->collHbfPrepagoss->contains($l)) {
            $this->doAddHbfPrepagos($l);

            if ($this->hbfPrepagossScheduledForDeletion and $this->hbfPrepagossScheduledForDeletion->contains($l)) {
                $this->hbfPrepagossScheduledForDeletion->remove($this->hbfPrepagossScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfPrepagos $hbfPrepagos The ChildHbfPrepagos object to add.
     */
    protected function doAddHbfPrepagos(ChildHbfPrepagos $hbfPrepagos)
    {
        $this->collHbfPrepagoss[]= $hbfPrepagos;
        $hbfPrepagos->setHbfSesiones($this);
    }

    /**
     * @param  ChildHbfPrepagos $hbfPrepagos The ChildHbfPrepagos object to remove.
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function removeHbfPrepagos(ChildHbfPrepagos $hbfPrepagos)
    {
        if ($this->getHbfPrepagoss()->contains($hbfPrepagos)) {
            $pos = $this->collHbfPrepagoss->search($hbfPrepagos);
            $this->collHbfPrepagoss->remove($pos);
            if (null === $this->hbfPrepagossScheduledForDeletion) {
                $this->hbfPrepagossScheduledForDeletion = clone $this->collHbfPrepagoss;
                $this->hbfPrepagossScheduledForDeletion->clear();
            }
            $this->hbfPrepagossScheduledForDeletion[]= clone $hbfPrepagos;
            $hbfPrepagos->setHbfSesiones(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossJoinCiUsuariosRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdCliente', $joinBehavior);

        return $this->getHbfPrepagoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfPrepagoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfPrepagoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfPrepagoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfPrepagoss($query, $con);
    }

    /**
     * Clears out the collHbfVentass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfVentass()
     */
    public function clearHbfVentass()
    {
        $this->collHbfVentass = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfVentass collection loaded partially.
     */
    public function resetPartialHbfVentass($v = true)
    {
        $this->collHbfVentassPartial = $v;
    }

    /**
     * Initializes the collHbfVentass collection.
     *
     * By default this just sets the collHbfVentass collection to an empty array (like clearcollHbfVentass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfVentass($overrideExisting = true)
    {
        if (null !== $this->collHbfVentass && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfVentasTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfVentass = new $collectionClassName;
        $this->collHbfVentass->setModel('\HbfVentas');
    }

    /**
     * Gets an array of ChildHbfVentas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfSesiones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     * @throws PropelException
     */
    public function getHbfVentass(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassPartial && !$this->isNew();
        if (null === $this->collHbfVentass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfVentass) {
                // return empty collection
                $this->initHbfVentass();
            } else {
                $collHbfVentass = ChildHbfVentasQuery::create(null, $criteria)
                    ->filterByHbfSesiones($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfVentassPartial && count($collHbfVentass)) {
                        $this->initHbfVentass(false);

                        foreach ($collHbfVentass as $obj) {
                            if (false == $this->collHbfVentass->contains($obj)) {
                                $this->collHbfVentass->append($obj);
                            }
                        }

                        $this->collHbfVentassPartial = true;
                    }

                    return $collHbfVentass;
                }

                if ($partial && $this->collHbfVentass) {
                    foreach ($this->collHbfVentass as $obj) {
                        if ($obj->isNew()) {
                            $collHbfVentass[] = $obj;
                        }
                    }
                }

                $this->collHbfVentass = $collHbfVentass;
                $this->collHbfVentassPartial = false;
            }
        }

        return $this->collHbfVentass;
    }

    /**
     * Sets a collection of ChildHbfVentas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfVentass A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function setHbfVentass(Collection $hbfVentass, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVentas[] $hbfVentassToDelete */
        $hbfVentassToDelete = $this->getHbfVentass(new Criteria(), $con)->diff($hbfVentass);


        $this->hbfVentassScheduledForDeletion = $hbfVentassToDelete;

        foreach ($hbfVentassToDelete as $hbfVentasRemoved) {
            $hbfVentasRemoved->setHbfSesiones(null);
        }

        $this->collHbfVentass = null;
        foreach ($hbfVentass as $hbfVentas) {
            $this->addHbfVentas($hbfVentas);
        }

        $this->collHbfVentass = $hbfVentass;
        $this->collHbfVentassPartial = false;

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
    public function countHbfVentass(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVentassPartial && !$this->isNew();
        if (null === $this->collHbfVentass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfVentass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfVentass());
            }

            $query = ChildHbfVentasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfSesiones($this)
                ->count($con);
        }

        return count($this->collHbfVentass);
    }

    /**
     * Method called to associate a ChildHbfVentas object to this object
     * through the ChildHbfVentas foreign key attribute.
     *
     * @param  ChildHbfVentas $l ChildHbfVentas
     * @return $this|\HbfSesiones The current object (for fluent API support)
     */
    public function addHbfVentas(ChildHbfVentas $l)
    {
        if ($this->collHbfVentass === null) {
            $this->initHbfVentass();
            $this->collHbfVentassPartial = true;
        }

        if (!$this->collHbfVentass->contains($l)) {
            $this->doAddHbfVentas($l);

            if ($this->hbfVentassScheduledForDeletion and $this->hbfVentassScheduledForDeletion->contains($l)) {
                $this->hbfVentassScheduledForDeletion->remove($this->hbfVentassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfVentas $hbfVentas The ChildHbfVentas object to add.
     */
    protected function doAddHbfVentas(ChildHbfVentas $hbfVentas)
    {
        $this->collHbfVentass[]= $hbfVentas;
        $hbfVentas->setHbfSesiones($this);
    }

    /**
     * @param  ChildHbfVentas $hbfVentas The ChildHbfVentas object to remove.
     * @return $this|ChildHbfSesiones The current object (for fluent API support)
     */
    public function removeHbfVentas(ChildHbfVentas $hbfVentas)
    {
        if ($this->getHbfVentass()->contains($hbfVentas)) {
            $pos = $this->collHbfVentass->search($hbfVentas);
            $this->collHbfVentass->remove($pos);
            if (null === $this->hbfVentassScheduledForDeletion) {
                $this->hbfVentassScheduledForDeletion = clone $this->collHbfVentass;
                $this->hbfVentassScheduledForDeletion->clear();
            }
            $this->hbfVentassScheduledForDeletion[]= $hbfVentas;
            $hbfVentas->setHbfSesiones(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfVentass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfVentass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassJoinCiUsuariosRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdCliente', $joinBehavior);

        return $this->getHbfVentass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfVentass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfVentass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfSesiones is new, it will return
     * an empty collection; or if this HbfSesiones has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfSesiones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfVentass($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {
            $this->aCiUsuariosRelatedByIdUserCreated->removeHbfSesionesRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeHbfSesionesRelatedByIdUserModified($this);
        }
        if (null !== $this->aHbfClubs) {
            $this->aHbfClubs->removeHbfSesiones($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdAsociado) {
            $this->aCiUsuariosRelatedByIdAsociado->removeHbfSesionesRelatedByIdAsociado($this);
        }
        if (null !== $this->aHbfTurnos) {
            $this->aHbfTurnos->removeHbfSesiones($this);
        }
        if (null !== $this->aCiOptions) {
            $this->aCiOptions->removeHbfSesiones($this);
        }
        $this->id_sesion = null;
        $this->id_club = null;
        $this->id_turno = null;
        $this->id_asociado = null;
        $this->detalle = null;
        $this->caja_inicial = null;
        $this->caja_final = null;
        $this->total = null;
        $this->num_consumos = null;
        $this->total_ingresos = null;
        $this->total_egresos = null;
        $this->total_deben = null;
        $this->total_sobra = null;
        $this->total_falta = null;
        $this->sobre_rojo = null;
        $this->sobre_verde = null;
        $this->deposito = null;
        $this->cerrado = null;
        $this->observaciones = null;
        $this->fec_sesion = null;
        $this->id_opcion_sesion = null;
        $this->estado = null;
        $this->change_count = null;
        $this->id_user_modified = null;
        $this->id_user_created = null;
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
            if ($this->collCiSessionss) {
                foreach ($this->collCiSessionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdSesion) {
                foreach ($this->collCiUsuariossRelatedByIdSesion as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfComandass) {
                foreach ($this->collHbfComandass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfEgresoss) {
                foreach ($this->collHbfEgresoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfPrepagoss) {
                foreach ($this->collHbfPrepagoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVentass) {
                foreach ($this->collHbfVentass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCiSessionss = null;
        $this->collCiUsuariossRelatedByIdSesion = null;
        $this->collHbfComandass = null;
        $this->collHbfEgresoss = null;
        $this->collHbfPrepagoss = null;
        $this->collHbfVentass = null;
        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
        $this->aHbfClubs = null;
        $this->aCiUsuariosRelatedByIdAsociado = null;
        $this->aHbfTurnos = null;
        $this->aCiOptions = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(HbfSesionesTableMap::DEFAULT_STRING_FORMAT);
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
