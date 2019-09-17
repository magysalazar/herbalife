<?php

namespace Base;

use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
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
use Map\CiUsuariosTableMap;
use Map\HbfComandasTableMap;
use Map\HbfEgresosTableMap;
use Map\HbfPrepagosTableMap;
use Map\HbfSesionesTableMap;
use Map\HbfTurnosTableMap;
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
 * Base class that represents a row from the 'hbf_turnos' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class HbfTurnos implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\HbfTurnosTableMap';


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
     * The value for the id_turno field.
     *
     * @var        int
     */
    protected $id_turno;

    /**
     * The value for the id_club field.
     *
     * @var        int
     */
    protected $id_club;

    /**
     * The value for the id_asociado field.
     *
     * @var        int
     */
    protected $id_asociado;

    /**
     * The value for the descripcion field.
     *
     * @var        string
     */
    protected $descripcion;

    /**
     * The value for the fec_inicio field.
     *
     * @var        DateTime
     */
    protected $fec_inicio;

    /**
     * The value for the fec_fin field.
     *
     * @var        DateTime
     */
    protected $fec_fin;

    /**
     * The value for the horario_desde field.
     *
     * @var        DateTime
     */
    protected $horario_desde;

    /**
     * The value for the horario_hasta field.
     *
     * @var        DateTime
     */
    protected $horario_hasta;

    /**
     * The value for the total_consumos field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $total_consumos;

    /**
     * The value for the id_opcion_turnos field.
     *
     * @var        int
     */
    protected $id_opcion_turnos;

    /**
     * The value for the change_count field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $change_count;

    /**
     * The value for the estado field.
     *
     * Note: this column has a database default value of: 'ENABLED'
     * @var        string
     */
    protected $estado;

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
     * @var        ChildCiUsuarios
     */
    protected $aCiUsuariosRelatedByIdAsociado;

    /**
     * @var        ChildHbfClubs
     */
    protected $aHbfClubs;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptions;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdTurno;
    protected $collCiUsuariossRelatedByIdTurnoPartial;

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
     * @var        ObjectCollection|ChildHbfSesiones[] Collection to store aggregation of ChildHbfSesiones objects.
     */
    protected $collHbfSesioness;
    protected $collHbfSesionessPartial;

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
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdTurnoScheduledForDeletion = null;

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
     * @var ObjectCollection|ChildHbfSesiones[]
     */
    protected $hbfSesionessScheduledForDeletion = null;

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
        $this->total_consumos = 0;
        $this->change_count = 0;
        $this->estado = 'ENABLED';
    }

    /**
     * Initializes internal state of Base\HbfTurnos object.
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
     * Compares this with another <code>HbfTurnos</code> instance.  If
     * <code>obj</code> is an instance of <code>HbfTurnos</code>, delegates to
     * <code>equals(HbfTurnos)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|HbfTurnos The current object, for fluid interface
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
     * Get the [id_turno] column value.
     *
     * @return int
     */
    public function getIdTurno()
    {
        return $this->id_turno;
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
     * Get the [id_asociado] column value.
     *
     * @return int
     */
    public function getIdAsociado()
    {
        return $this->id_asociado;
    }

    /**
     * Get the [descripcion] column value.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the [optionally formatted] temporal [fec_inicio] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFecInicio($format = NULL)
    {
        if ($format === null) {
            return $this->fec_inicio;
        } else {
            return $this->fec_inicio instanceof \DateTimeInterface ? $this->fec_inicio->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [fec_fin] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFecFin($format = NULL)
    {
        if ($format === null) {
            return $this->fec_fin;
        } else {
            return $this->fec_fin instanceof \DateTimeInterface ? $this->fec_fin->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [horario_desde] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHorarioDesde($format = NULL)
    {
        if ($format === null) {
            return $this->horario_desde;
        } else {
            return $this->horario_desde instanceof \DateTimeInterface ? $this->horario_desde->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [horario_hasta] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHorarioHasta($format = NULL)
    {
        if ($format === null) {
            return $this->horario_hasta;
        } else {
            return $this->horario_hasta instanceof \DateTimeInterface ? $this->horario_hasta->format($format) : null;
        }
    }

    /**
     * Get the [total_consumos] column value.
     *
     * @return int
     */
    public function getTotalConsumos()
    {
        return $this->total_consumos;
    }

    /**
     * Get the [id_opcion_turnos] column value.
     *
     * @return int
     */
    public function getIdOpcionTurnos()
    {
        return $this->id_opcion_turnos;
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
     * Get the [estado] column value.
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
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
     * Set the value of [id_turno] column.
     *
     * @param int $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setIdTurno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_turno !== $v) {
            $this->id_turno = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_ID_TURNO] = true;
        }

        return $this;
    } // setIdTurno()

    /**
     * Set the value of [id_club] column.
     *
     * @param int $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setIdClub($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_club !== $v) {
            $this->id_club = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_ID_CLUB] = true;
        }

        if ($this->aHbfClubs !== null && $this->aHbfClubs->getIdClub() !== $v) {
            $this->aHbfClubs = null;
        }

        return $this;
    } // setIdClub()

    /**
     * Set the value of [id_asociado] column.
     *
     * @param int $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setIdAsociado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_asociado !== $v) {
            $this->id_asociado = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_ID_ASOCIADO] = true;
        }

        if ($this->aCiUsuariosRelatedByIdAsociado !== null && $this->aCiUsuariosRelatedByIdAsociado->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdAsociado = null;
        }

        return $this;
    } // setIdAsociado()

    /**
     * Set the value of [descripcion] column.
     *
     * @param string $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_DESCRIPCION] = true;
        }

        return $this;
    } // setDescripcion()

    /**
     * Sets the value of [fec_inicio] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setFecInicio($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fec_inicio !== null || $dt !== null) {
            if ($this->fec_inicio === null || $dt === null || $dt->format("Y-m-d") !== $this->fec_inicio->format("Y-m-d")) {
                $this->fec_inicio = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfTurnosTableMap::COL_FEC_INICIO] = true;
            }
        } // if either are not null

        return $this;
    } // setFecInicio()

    /**
     * Sets the value of [fec_fin] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setFecFin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fec_fin !== null || $dt !== null) {
            if ($this->fec_fin === null || $dt === null || $dt->format("Y-m-d") !== $this->fec_fin->format("Y-m-d")) {
                $this->fec_fin = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfTurnosTableMap::COL_FEC_FIN] = true;
            }
        } // if either are not null

        return $this;
    } // setFecFin()

    /**
     * Sets the value of [horario_desde] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setHorarioDesde($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->horario_desde !== null || $dt !== null) {
            if ($this->horario_desde === null || $dt === null || $dt->format("H:i:s.u") !== $this->horario_desde->format("H:i:s.u")) {
                $this->horario_desde = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfTurnosTableMap::COL_HORARIO_DESDE] = true;
            }
        } // if either are not null

        return $this;
    } // setHorarioDesde()

    /**
     * Sets the value of [horario_hasta] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setHorarioHasta($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->horario_hasta !== null || $dt !== null) {
            if ($this->horario_hasta === null || $dt === null || $dt->format("H:i:s.u") !== $this->horario_hasta->format("H:i:s.u")) {
                $this->horario_hasta = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfTurnosTableMap::COL_HORARIO_HASTA] = true;
            }
        } // if either are not null

        return $this;
    } // setHorarioHasta()

    /**
     * Set the value of [total_consumos] column.
     *
     * @param int $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setTotalConsumos($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->total_consumos !== $v) {
            $this->total_consumos = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_TOTAL_CONSUMOS] = true;
        }

        return $this;
    } // setTotalConsumos()

    /**
     * Set the value of [id_opcion_turnos] column.
     *
     * @param int $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setIdOpcionTurnos($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_opcion_turnos !== $v) {
            $this->id_opcion_turnos = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_ID_OPCION_TURNOS] = true;
        }

        if ($this->aCiOptions !== null && $this->aCiOptions->getIdOption() !== $v) {
            $this->aCiOptions = null;
        }

        return $this;
    } // setIdOpcionTurnos()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[HbfTurnosTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfTurnosTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfTurnosTableMap::COL_DATE_CREATED] = true;
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
            if ($this->total_consumos !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : HbfTurnosTableMap::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_turno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : HbfTurnosTableMap::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_club = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : HbfTurnosTableMap::translateFieldName('IdAsociado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_asociado = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : HbfTurnosTableMap::translateFieldName('Descripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : HbfTurnosTableMap::translateFieldName('FecInicio', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fec_inicio = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : HbfTurnosTableMap::translateFieldName('FecFin', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fec_fin = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : HbfTurnosTableMap::translateFieldName('HorarioDesde', TableMap::TYPE_PHPNAME, $indexType)];
            $this->horario_desde = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : HbfTurnosTableMap::translateFieldName('HorarioHasta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->horario_hasta = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : HbfTurnosTableMap::translateFieldName('TotalConsumos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_consumos = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : HbfTurnosTableMap::translateFieldName('IdOpcionTurnos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_opcion_turnos = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : HbfTurnosTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : HbfTurnosTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : HbfTurnosTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : HbfTurnosTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : HbfTurnosTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : HbfTurnosTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = HbfTurnosTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\HbfTurnos'), 0, $e);
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
        if ($this->aCiUsuariosRelatedByIdAsociado !== null && $this->id_asociado !== $this->aCiUsuariosRelatedByIdAsociado->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdAsociado = null;
        }
        if ($this->aCiOptions !== null && $this->id_opcion_turnos !== $this->aCiOptions->getIdOption()) {
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
            $con = Propel::getServiceContainer()->getReadConnection(HbfTurnosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildHbfTurnosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aCiUsuariosRelatedByIdAsociado = null;
            $this->aHbfClubs = null;
            $this->aCiOptions = null;
            $this->collCiUsuariossRelatedByIdTurno = null;

            $this->collHbfComandass = null;

            $this->collHbfEgresoss = null;

            $this->collHbfPrepagoss = null;

            $this->collHbfSesioness = null;

            $this->collHbfVentass = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see HbfTurnos::setDeleted()
     * @see HbfTurnos::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfTurnosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildHbfTurnosQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfTurnosTableMap::DATABASE_NAME);
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
                HbfTurnosTableMap::addInstanceToPool($this);
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

            if ($this->aCiUsuariosRelatedByIdAsociado !== null) {
                if ($this->aCiUsuariosRelatedByIdAsociado->isModified() || $this->aCiUsuariosRelatedByIdAsociado->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByIdAsociado->save($con);
                }
                $this->setCiUsuariosRelatedByIdAsociado($this->aCiUsuariosRelatedByIdAsociado);
            }

            if ($this->aHbfClubs !== null) {
                if ($this->aHbfClubs->isModified() || $this->aHbfClubs->isNew()) {
                    $affectedRows += $this->aHbfClubs->save($con);
                }
                $this->setHbfClubs($this->aHbfClubs);
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

            if ($this->ciUsuariossRelatedByIdTurnoScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdTurnoScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdTurnoScheduledForDeletion as $ciUsuariosRelatedByIdTurno) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdTurno->save($con);
                    }
                    $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdTurno !== null) {
                foreach ($this->collCiUsuariossRelatedByIdTurno as $referrerFK) {
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
                    foreach ($this->hbfPrepagossScheduledForDeletion as $hbfPrepagos) {
                        // need to save related object because we set the relation to null
                        $hbfPrepagos->save($con);
                    }
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

            if ($this->hbfSesionessScheduledForDeletion !== null) {
                if (!$this->hbfSesionessScheduledForDeletion->isEmpty()) {
                    \HbfSesionesQuery::create()
                        ->filterByPrimaryKeys($this->hbfSesionessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfSesionessScheduledForDeletion = null;
                }
            }

            if ($this->collHbfSesioness !== null) {
                foreach ($this->collHbfSesioness as $referrerFK) {
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

        $this->modifiedColumns[HbfTurnosTableMap::COL_ID_TURNO] = true;
        if (null !== $this->id_turno) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HbfTurnosTableMap::COL_ID_TURNO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_TURNO)) {
            $modifiedColumns[':p' . $index++]  = 'id_turno';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_CLUB)) {
            $modifiedColumns[':p' . $index++]  = 'id_club';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_ASOCIADO)) {
            $modifiedColumns[':p' . $index++]  = 'id_asociado';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'descripcion';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_FEC_INICIO)) {
            $modifiedColumns[':p' . $index++]  = 'fec_inicio';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_FEC_FIN)) {
            $modifiedColumns[':p' . $index++]  = 'fec_fin';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_HORARIO_DESDE)) {
            $modifiedColumns[':p' . $index++]  = 'horario_desde';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_HORARIO_HASTA)) {
            $modifiedColumns[':p' . $index++]  = 'horario_hasta';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_TOTAL_CONSUMOS)) {
            $modifiedColumns[':p' . $index++]  = 'total_consumos';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_OPCION_TURNOS)) {
            $modifiedColumns[':p' . $index++]  = 'id_opcion_turnos';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO hbf_turnos (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_turno':
                        $stmt->bindValue($identifier, $this->id_turno, PDO::PARAM_INT);
                        break;
                    case 'id_club':
                        $stmt->bindValue($identifier, $this->id_club, PDO::PARAM_INT);
                        break;
                    case 'id_asociado':
                        $stmt->bindValue($identifier, $this->id_asociado, PDO::PARAM_INT);
                        break;
                    case 'descripcion':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case 'fec_inicio':
                        $stmt->bindValue($identifier, $this->fec_inicio ? $this->fec_inicio->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'fec_fin':
                        $stmt->bindValue($identifier, $this->fec_fin ? $this->fec_fin->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'horario_desde':
                        $stmt->bindValue($identifier, $this->horario_desde ? $this->horario_desde->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'horario_hasta':
                        $stmt->bindValue($identifier, $this->horario_hasta ? $this->horario_hasta->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'total_consumos':
                        $stmt->bindValue($identifier, $this->total_consumos, PDO::PARAM_INT);
                        break;
                    case 'id_opcion_turnos':
                        $stmt->bindValue($identifier, $this->id_opcion_turnos, PDO::PARAM_INT);
                        break;
                    case 'change_count':
                        $stmt->bindValue($identifier, $this->change_count, PDO::PARAM_INT);
                        break;
                    case 'estado':
                        $stmt->bindValue($identifier, $this->estado, PDO::PARAM_STR);
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
        $this->setIdTurno($pk);

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
        $pos = HbfTurnosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdTurno();
                break;
            case 1:
                return $this->getIdClub();
                break;
            case 2:
                return $this->getIdAsociado();
                break;
            case 3:
                return $this->getDescripcion();
                break;
            case 4:
                return $this->getFecInicio();
                break;
            case 5:
                return $this->getFecFin();
                break;
            case 6:
                return $this->getHorarioDesde();
                break;
            case 7:
                return $this->getHorarioHasta();
                break;
            case 8:
                return $this->getTotalConsumos();
                break;
            case 9:
                return $this->getIdOpcionTurnos();
                break;
            case 10:
                return $this->getChangeCount();
                break;
            case 11:
                return $this->getEstado();
                break;
            case 12:
                return $this->getIdUserModified();
                break;
            case 13:
                return $this->getIdUserCreated();
                break;
            case 14:
                return $this->getDateModified();
                break;
            case 15:
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

        if (isset($alreadyDumpedObjects['HbfTurnos'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['HbfTurnos'][$this->hashCode()] = true;
        $keys = HbfTurnosTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdTurno(),
            $keys[1] => $this->getIdClub(),
            $keys[2] => $this->getIdAsociado(),
            $keys[3] => $this->getDescripcion(),
            $keys[4] => $this->getFecInicio(),
            $keys[5] => $this->getFecFin(),
            $keys[6] => $this->getHorarioDesde(),
            $keys[7] => $this->getHorarioHasta(),
            $keys[8] => $this->getTotalConsumos(),
            $keys[9] => $this->getIdOpcionTurnos(),
            $keys[10] => $this->getChangeCount(),
            $keys[11] => $this->getEstado(),
            $keys[12] => $this->getIdUserModified(),
            $keys[13] => $this->getIdUserCreated(),
            $keys[14] => $this->getDateModified(),
            $keys[15] => $this->getDateCreated(),
        );
        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        if ($result[$keys[14]] instanceof \DateTimeInterface) {
            $result[$keys[14]] = $result[$keys[14]]->format('c');
        }

        if ($result[$keys[15]] instanceof \DateTimeInterface) {
            $result[$keys[15]] = $result[$keys[15]]->format('c');
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
            if (null !== $this->collCiUsuariossRelatedByIdTurno) {

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

                $result[$key] = $this->collCiUsuariossRelatedByIdTurno->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collHbfSesioness) {

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

                $result[$key] = $this->collHbfSesioness->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\HbfTurnos
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = HbfTurnosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\HbfTurnos
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdTurno($value);
                break;
            case 1:
                $this->setIdClub($value);
                break;
            case 2:
                $this->setIdAsociado($value);
                break;
            case 3:
                $this->setDescripcion($value);
                break;
            case 4:
                $this->setFecInicio($value);
                break;
            case 5:
                $this->setFecFin($value);
                break;
            case 6:
                $this->setHorarioDesde($value);
                break;
            case 7:
                $this->setHorarioHasta($value);
                break;
            case 8:
                $this->setTotalConsumos($value);
                break;
            case 9:
                $this->setIdOpcionTurnos($value);
                break;
            case 10:
                $this->setChangeCount($value);
                break;
            case 11:
                $this->setEstado($value);
                break;
            case 12:
                $this->setIdUserModified($value);
                break;
            case 13:
                $this->setIdUserCreated($value);
                break;
            case 14:
                $this->setDateModified($value);
                break;
            case 15:
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
        $keys = HbfTurnosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdTurno($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdClub($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdAsociado($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescripcion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFecInicio($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFecFin($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setHorarioDesde($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setHorarioHasta($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTotalConsumos($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setIdOpcionTurnos($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setChangeCount($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setEstado($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIdUserModified($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setIdUserCreated($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDateModified($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDateCreated($arr[$keys[15]]);
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
     * @return $this|\HbfTurnos The current object, for fluid interface
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
        $criteria = new Criteria(HbfTurnosTableMap::DATABASE_NAME);

        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_TURNO)) {
            $criteria->add(HbfTurnosTableMap::COL_ID_TURNO, $this->id_turno);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_CLUB)) {
            $criteria->add(HbfTurnosTableMap::COL_ID_CLUB, $this->id_club);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_ASOCIADO)) {
            $criteria->add(HbfTurnosTableMap::COL_ID_ASOCIADO, $this->id_asociado);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_DESCRIPCION)) {
            $criteria->add(HbfTurnosTableMap::COL_DESCRIPCION, $this->descripcion);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_FEC_INICIO)) {
            $criteria->add(HbfTurnosTableMap::COL_FEC_INICIO, $this->fec_inicio);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_FEC_FIN)) {
            $criteria->add(HbfTurnosTableMap::COL_FEC_FIN, $this->fec_fin);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_HORARIO_DESDE)) {
            $criteria->add(HbfTurnosTableMap::COL_HORARIO_DESDE, $this->horario_desde);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_HORARIO_HASTA)) {
            $criteria->add(HbfTurnosTableMap::COL_HORARIO_HASTA, $this->horario_hasta);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_TOTAL_CONSUMOS)) {
            $criteria->add(HbfTurnosTableMap::COL_TOTAL_CONSUMOS, $this->total_consumos);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_OPCION_TURNOS)) {
            $criteria->add(HbfTurnosTableMap::COL_ID_OPCION_TURNOS, $this->id_opcion_turnos);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(HbfTurnosTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ESTADO)) {
            $criteria->add(HbfTurnosTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(HbfTurnosTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(HbfTurnosTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(HbfTurnosTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(HbfTurnosTableMap::COL_DATE_CREATED)) {
            $criteria->add(HbfTurnosTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildHbfTurnosQuery::create();
        $criteria->add(HbfTurnosTableMap::COL_ID_TURNO, $this->id_turno);

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
        $validPk = null !== $this->getIdTurno();

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
        return $this->getIdTurno();
    }

    /**
     * Generic method to set the primary key (id_turno column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdTurno($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdTurno();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HbfTurnos (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdClub($this->getIdClub());
        $copyObj->setIdAsociado($this->getIdAsociado());
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setFecInicio($this->getFecInicio());
        $copyObj->setFecFin($this->getFecFin());
        $copyObj->setHorarioDesde($this->getHorarioDesde());
        $copyObj->setHorarioHasta($this->getHorarioHasta());
        $copyObj->setTotalConsumos($this->getTotalConsumos());
        $copyObj->setIdOpcionTurnos($this->getIdOpcionTurnos());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setEstado($this->getEstado());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCiUsuariossRelatedByIdTurno() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdTurno($relObj->copy($deepCopy));
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

            foreach ($this->getHbfSesioness() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfSesiones($relObj->copy($deepCopy));
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
            $copyObj->setIdTurno(NULL); // this is a auto-increment column, so set to default value
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
     * @return \HbfTurnos Clone of current object.
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
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
            $v->addHbfTurnosRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addHbfTurnossRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
            $v->addHbfTurnosRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addHbfTurnossRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
            $v->addHbfTurnosRelatedByIdAsociado($this);
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
                $this->aCiUsuariosRelatedByIdAsociado->addHbfTurnossRelatedByIdAsociado($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdAsociado;
    }

    /**
     * Declares an association between this object and a ChildHbfClubs object.
     *
     * @param  ChildHbfClubs $v
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
            $v->addHbfTurnos($this);
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
                $this->aHbfClubs->addHbfTurnoss($this);
             */
        }

        return $this->aHbfClubs;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\HbfTurnos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptions(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOpcionTurnos(NULL);
        } else {
            $this->setIdOpcionTurnos($v->getIdOption());
        }

        $this->aCiOptions = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfTurnos($this);
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
        if ($this->aCiOptions === null && ($this->id_opcion_turnos != 0)) {
            $this->aCiOptions = ChildCiOptionsQuery::create()->findPk($this->id_opcion_turnos, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptions->addHbfTurnoss($this);
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
        if ('CiUsuariosRelatedByIdTurno' == $relationName) {
            $this->initCiUsuariossRelatedByIdTurno();
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
        if ('HbfSesiones' == $relationName) {
            $this->initHbfSesioness();
            return;
        }
        if ('HbfVentas' == $relationName) {
            $this->initHbfVentass();
            return;
        }
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdTurno collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdTurno()
     */
    public function clearCiUsuariossRelatedByIdTurno()
    {
        $this->collCiUsuariossRelatedByIdTurno = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdTurno collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdTurno($v = true)
    {
        $this->collCiUsuariossRelatedByIdTurnoPartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdTurno collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdTurno collection to an empty array (like clearcollCiUsuariossRelatedByIdTurno());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdTurno($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdTurno && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdTurno = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdTurno->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfTurnos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdTurnoPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdTurno || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdTurno) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdTurno();
            } else {
                $collCiUsuariossRelatedByIdTurno = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByHbfTurnosRelatedByIdTurno($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdTurnoPartial && count($collCiUsuariossRelatedByIdTurno)) {
                        $this->initCiUsuariossRelatedByIdTurno(false);

                        foreach ($collCiUsuariossRelatedByIdTurno as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdTurno->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdTurno->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdTurnoPartial = true;
                    }

                    return $collCiUsuariossRelatedByIdTurno;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdTurno) {
                    foreach ($this->collCiUsuariossRelatedByIdTurno as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdTurno[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdTurno = $collCiUsuariossRelatedByIdTurno;
                $this->collCiUsuariossRelatedByIdTurnoPartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdTurno;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdTurno A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdTurno(Collection $ciUsuariossRelatedByIdTurno, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdTurnoToDelete */
        $ciUsuariossRelatedByIdTurnoToDelete = $this->getCiUsuariossRelatedByIdTurno(new Criteria(), $con)->diff($ciUsuariossRelatedByIdTurno);


        $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion = $ciUsuariossRelatedByIdTurnoToDelete;

        foreach ($ciUsuariossRelatedByIdTurnoToDelete as $ciUsuariosRelatedByIdTurnoRemoved) {
            $ciUsuariosRelatedByIdTurnoRemoved->setHbfTurnosRelatedByIdTurno(null);
        }

        $this->collCiUsuariossRelatedByIdTurno = null;
        foreach ($ciUsuariossRelatedByIdTurno as $ciUsuariosRelatedByIdTurno) {
            $this->addCiUsuariosRelatedByIdTurno($ciUsuariosRelatedByIdTurno);
        }

        $this->collCiUsuariossRelatedByIdTurno = $ciUsuariossRelatedByIdTurno;
        $this->collCiUsuariossRelatedByIdTurnoPartial = false;

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
    public function countCiUsuariossRelatedByIdTurno(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdTurnoPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdTurno || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdTurno) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdTurno());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfTurnosRelatedByIdTurno($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdTurno);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdTurno(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdTurno === null) {
            $this->initCiUsuariossRelatedByIdTurno();
            $this->collCiUsuariossRelatedByIdTurnoPartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdTurno->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdTurno($l);

            if ($this->ciUsuariossRelatedByIdTurnoScheduledForDeletion and $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion->remove($this->ciUsuariossRelatedByIdTurnoScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdTurno The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdTurno(ChildCiUsuarios $ciUsuariosRelatedByIdTurno)
    {
        $this->collCiUsuariossRelatedByIdTurno[]= $ciUsuariosRelatedByIdTurno;
        $ciUsuariosRelatedByIdTurno->setHbfTurnosRelatedByIdTurno($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdTurno The ChildCiUsuarios object to remove.
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdTurno(ChildCiUsuarios $ciUsuariosRelatedByIdTurno)
    {
        if ($this->getCiUsuariossRelatedByIdTurno()->contains($ciUsuariosRelatedByIdTurno)) {
            $pos = $this->collCiUsuariossRelatedByIdTurno->search($ciUsuariosRelatedByIdTurno);
            $this->collCiUsuariossRelatedByIdTurno->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdTurno;
                $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdTurnoScheduledForDeletion[]= $ciUsuariosRelatedByIdTurno;
            $ciUsuariosRelatedByIdTurno->setHbfTurnosRelatedByIdTurno(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTurno from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTurnoJoinCiOptionsRelatedByIdOptionTipoAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionTipoAsociado', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTurno($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTurno from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTurnoJoinCiOptionsRelatedByIdOptionNivelAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOptionNivelAsociado', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTurno($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTurno from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTurnoJoinCiUsuariosRelatedByInvitadoPor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByInvitadoPor', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTurno($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTurno from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTurnoJoinCiOptionsRelatedByIdOpcionRole(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdOpcionRole', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTurno($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTurno from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTurnoJoinHbfSesionesRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfSesionesRelatedByIdSesion', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTurno($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTurno from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTurnoJoinCiOptionsRelatedByIdTipoUsuario(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiOptionsRelatedByIdTipoUsuario', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTurno($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTurno from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTurnoJoinHbfClubsRelatedByIdClub(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfClubsRelatedByIdClub', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTurno($query, $con);
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
     * If this ChildHbfTurnos is new, it will return
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
                    ->filterByHbfTurnos($this)
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
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function setHbfComandass(Collection $hbfComandass, ConnectionInterface $con = null)
    {
        /** @var ChildHbfComandas[] $hbfComandassToDelete */
        $hbfComandassToDelete = $this->getHbfComandass(new Criteria(), $con)->diff($hbfComandass);


        $this->hbfComandassScheduledForDeletion = $hbfComandassToDelete;

        foreach ($hbfComandassToDelete as $hbfComandasRemoved) {
            $hbfComandasRemoved->setHbfTurnos(null);
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
                ->filterByHbfTurnos($this)
                ->count($con);
        }

        return count($this->collHbfComandass);
    }

    /**
     * Method called to associate a ChildHbfComandas object to this object
     * through the ChildHbfComandas foreign key attribute.
     *
     * @param  ChildHbfComandas $l ChildHbfComandas
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
        $hbfComandas->setHbfTurnos($this);
    }

    /**
     * @param  ChildHbfComandas $hbfComandas The ChildHbfComandas object to remove.
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
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
            $hbfComandas->setHbfTurnos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfComandas[] List of ChildHbfComandas objects
     */
    public function getHbfComandassJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfComandasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfComandass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * If this ChildHbfTurnos is new, it will return
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
                    ->filterByHbfTurnos($this)
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
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function setHbfEgresoss(Collection $hbfEgresoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfEgresos[] $hbfEgresossToDelete */
        $hbfEgresossToDelete = $this->getHbfEgresoss(new Criteria(), $con)->diff($hbfEgresoss);


        $this->hbfEgresossScheduledForDeletion = $hbfEgresossToDelete;

        foreach ($hbfEgresossToDelete as $hbfEgresosRemoved) {
            $hbfEgresosRemoved->setHbfTurnos(null);
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
                ->filterByHbfTurnos($this)
                ->count($con);
        }

        return count($this->collHbfEgresoss);
    }

    /**
     * Method called to associate a ChildHbfEgresos object to this object
     * through the ChildHbfEgresos foreign key attribute.
     *
     * @param  ChildHbfEgresos $l ChildHbfEgresos
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
        $hbfEgresos->setHbfTurnos($this);
    }

    /**
     * @param  ChildHbfEgresos $hbfEgresos The ChildHbfEgresos object to remove.
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
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
            $hbfEgresos->setHbfTurnos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfEgresos[] List of ChildHbfEgresos objects
     */
    public function getHbfEgresossJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfEgresosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfEgresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfEgresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * If this ChildHbfTurnos is new, it will return
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
                    ->filterByHbfTurnos($this)
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
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function setHbfPrepagoss(Collection $hbfPrepagoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPrepagos[] $hbfPrepagossToDelete */
        $hbfPrepagossToDelete = $this->getHbfPrepagoss(new Criteria(), $con)->diff($hbfPrepagoss);


        $this->hbfPrepagossScheduledForDeletion = $hbfPrepagossToDelete;

        foreach ($hbfPrepagossToDelete as $hbfPrepagosRemoved) {
            $hbfPrepagosRemoved->setHbfTurnos(null);
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
                ->filterByHbfTurnos($this)
                ->count($con);
        }

        return count($this->collHbfPrepagoss);
    }

    /**
     * Method called to associate a ChildHbfPrepagos object to this object
     * through the ChildHbfPrepagos foreign key attribute.
     *
     * @param  ChildHbfPrepagos $l ChildHbfPrepagos
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
        $hbfPrepagos->setHbfTurnos($this);
    }

    /**
     * @param  ChildHbfPrepagos $hbfPrepagos The ChildHbfPrepagos object to remove.
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
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
            $this->hbfPrepagossScheduledForDeletion[]= $hbfPrepagos;
            $hbfPrepagos->setHbfTurnos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPrepagos[] List of ChildHbfPrepagos objects
     */
    public function getHbfPrepagossJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPrepagosQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfPrepagoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Clears out the collHbfSesioness collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfSesioness()
     */
    public function clearHbfSesioness()
    {
        $this->collHbfSesioness = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfSesioness collection loaded partially.
     */
    public function resetPartialHbfSesioness($v = true)
    {
        $this->collHbfSesionessPartial = $v;
    }

    /**
     * Initializes the collHbfSesioness collection.
     *
     * By default this just sets the collHbfSesioness collection to an empty array (like clearcollHbfSesioness());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfSesioness($overrideExisting = true)
    {
        if (null !== $this->collHbfSesioness && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfSesionesTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfSesioness = new $collectionClassName;
        $this->collHbfSesioness->setModel('\HbfSesiones');
    }

    /**
     * Gets an array of ChildHbfSesiones objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfTurnos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     * @throws PropelException
     */
    public function getHbfSesioness(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessPartial && !$this->isNew();
        if (null === $this->collHbfSesioness || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfSesioness) {
                // return empty collection
                $this->initHbfSesioness();
            } else {
                $collHbfSesioness = ChildHbfSesionesQuery::create(null, $criteria)
                    ->filterByHbfTurnos($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfSesionessPartial && count($collHbfSesioness)) {
                        $this->initHbfSesioness(false);

                        foreach ($collHbfSesioness as $obj) {
                            if (false == $this->collHbfSesioness->contains($obj)) {
                                $this->collHbfSesioness->append($obj);
                            }
                        }

                        $this->collHbfSesionessPartial = true;
                    }

                    return $collHbfSesioness;
                }

                if ($partial && $this->collHbfSesioness) {
                    foreach ($this->collHbfSesioness as $obj) {
                        if ($obj->isNew()) {
                            $collHbfSesioness[] = $obj;
                        }
                    }
                }

                $this->collHbfSesioness = $collHbfSesioness;
                $this->collHbfSesionessPartial = false;
            }
        }

        return $this->collHbfSesioness;
    }

    /**
     * Sets a collection of ChildHbfSesiones objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfSesioness A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function setHbfSesioness(Collection $hbfSesioness, ConnectionInterface $con = null)
    {
        /** @var ChildHbfSesiones[] $hbfSesionessToDelete */
        $hbfSesionessToDelete = $this->getHbfSesioness(new Criteria(), $con)->diff($hbfSesioness);


        $this->hbfSesionessScheduledForDeletion = $hbfSesionessToDelete;

        foreach ($hbfSesionessToDelete as $hbfSesionesRemoved) {
            $hbfSesionesRemoved->setHbfTurnos(null);
        }

        $this->collHbfSesioness = null;
        foreach ($hbfSesioness as $hbfSesiones) {
            $this->addHbfSesiones($hbfSesiones);
        }

        $this->collHbfSesioness = $hbfSesioness;
        $this->collHbfSesionessPartial = false;

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
    public function countHbfSesioness(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfSesionessPartial && !$this->isNew();
        if (null === $this->collHbfSesioness || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfSesioness) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfSesioness());
            }

            $query = ChildHbfSesionesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfTurnos($this)
                ->count($con);
        }

        return count($this->collHbfSesioness);
    }

    /**
     * Method called to associate a ChildHbfSesiones object to this object
     * through the ChildHbfSesiones foreign key attribute.
     *
     * @param  ChildHbfSesiones $l ChildHbfSesiones
     * @return $this|\HbfTurnos The current object (for fluent API support)
     */
    public function addHbfSesiones(ChildHbfSesiones $l)
    {
        if ($this->collHbfSesioness === null) {
            $this->initHbfSesioness();
            $this->collHbfSesionessPartial = true;
        }

        if (!$this->collHbfSesioness->contains($l)) {
            $this->doAddHbfSesiones($l);

            if ($this->hbfSesionessScheduledForDeletion and $this->hbfSesionessScheduledForDeletion->contains($l)) {
                $this->hbfSesionessScheduledForDeletion->remove($this->hbfSesionessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfSesiones $hbfSesiones The ChildHbfSesiones object to add.
     */
    protected function doAddHbfSesiones(ChildHbfSesiones $hbfSesiones)
    {
        $this->collHbfSesioness[]= $hbfSesiones;
        $hbfSesiones->setHbfTurnos($this);
    }

    /**
     * @param  ChildHbfSesiones $hbfSesiones The ChildHbfSesiones object to remove.
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function removeHbfSesiones(ChildHbfSesiones $hbfSesiones)
    {
        if ($this->getHbfSesioness()->contains($hbfSesiones)) {
            $pos = $this->collHbfSesioness->search($hbfSesiones);
            $this->collHbfSesioness->remove($pos);
            if (null === $this->hbfSesionessScheduledForDeletion) {
                $this->hbfSesionessScheduledForDeletion = clone $this->collHbfSesioness;
                $this->hbfSesionessScheduledForDeletion->clear();
            }
            $this->hbfSesionessScheduledForDeletion[]= clone $hbfSesiones;
            $hbfSesiones->setHbfTurnos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfSesioness($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfSesioness($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfSesioness($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessJoinCiUsuariosRelatedByIdAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdAsociado', $joinBehavior);

        return $this->getHbfSesioness($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfSesioness($query, $con);
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
     * If this ChildHbfTurnos is new, it will return
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
                    ->filterByHbfTurnos($this)
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
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
     */
    public function setHbfVentass(Collection $hbfVentass, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVentas[] $hbfVentassToDelete */
        $hbfVentassToDelete = $this->getHbfVentass(new Criteria(), $con)->diff($hbfVentass);


        $this->hbfVentassScheduledForDeletion = $hbfVentassToDelete;

        foreach ($hbfVentassToDelete as $hbfVentasRemoved) {
            $hbfVentasRemoved->setHbfTurnos(null);
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
                ->filterByHbfTurnos($this)
                ->count($con);
        }

        return count($this->collHbfVentass);
    }

    /**
     * Method called to associate a ChildHbfVentas object to this object
     * through the ChildHbfVentas foreign key attribute.
     *
     * @param  ChildHbfVentas $l ChildHbfVentas
     * @return $this|\HbfTurnos The current object (for fluent API support)
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
        $hbfVentas->setHbfTurnos($this);
    }

    /**
     * @param  ChildHbfVentas $hbfVentas The ChildHbfVentas object to remove.
     * @return $this|ChildHbfTurnos The current object (for fluent API support)
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
            $hbfVentas->setHbfTurnos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVentas[] List of ChildHbfVentas objects
     */
    public function getHbfVentassJoinHbfSesiones(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVentasQuery::create(null, $criteria);
        $query->joinWith('HbfSesiones', $joinBehavior);

        return $this->getHbfVentass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfTurnos is new, it will return
     * an empty collection; or if this HbfTurnos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfTurnos.
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
            $this->aCiUsuariosRelatedByIdUserCreated->removeHbfTurnosRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeHbfTurnosRelatedByIdUserModified($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdAsociado) {
            $this->aCiUsuariosRelatedByIdAsociado->removeHbfTurnosRelatedByIdAsociado($this);
        }
        if (null !== $this->aHbfClubs) {
            $this->aHbfClubs->removeHbfTurnos($this);
        }
        if (null !== $this->aCiOptions) {
            $this->aCiOptions->removeHbfTurnos($this);
        }
        $this->id_turno = null;
        $this->id_club = null;
        $this->id_asociado = null;
        $this->descripcion = null;
        $this->fec_inicio = null;
        $this->fec_fin = null;
        $this->horario_desde = null;
        $this->horario_hasta = null;
        $this->total_consumos = null;
        $this->id_opcion_turnos = null;
        $this->change_count = null;
        $this->estado = null;
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
            if ($this->collCiUsuariossRelatedByIdTurno) {
                foreach ($this->collCiUsuariossRelatedByIdTurno as $o) {
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
            if ($this->collHbfSesioness) {
                foreach ($this->collHbfSesioness as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVentass) {
                foreach ($this->collHbfVentass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCiUsuariossRelatedByIdTurno = null;
        $this->collHbfComandass = null;
        $this->collHbfEgresoss = null;
        $this->collHbfPrepagoss = null;
        $this->collHbfSesioness = null;
        $this->collHbfVentass = null;
        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
        $this->aCiUsuariosRelatedByIdAsociado = null;
        $this->aHbfClubs = null;
        $this->aCiOptions = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(HbfTurnosTableMap::DEFAULT_STRING_FORMAT);
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
