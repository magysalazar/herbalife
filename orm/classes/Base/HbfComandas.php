<?php

namespace Base;

use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \HbfClubs as ChildHbfClubs;
use \HbfClubsQuery as ChildHbfClubsQuery;
use \HbfComandas as ChildHbfComandas;
use \HbfComandasQuery as ChildHbfComandasQuery;
use \HbfDetallesPedidos as ChildHbfDetallesPedidos;
use \HbfDetallesPedidosQuery as ChildHbfDetallesPedidosQuery;
use \HbfIngresos as ChildHbfIngresos;
use \HbfIngresosQuery as ChildHbfIngresosQuery;
use \HbfPrepagos as ChildHbfPrepagos;
use \HbfPrepagosQuery as ChildHbfPrepagosQuery;
use \HbfSesiones as ChildHbfSesiones;
use \HbfSesionesQuery as ChildHbfSesionesQuery;
use \HbfTurnos as ChildHbfTurnos;
use \HbfTurnosQuery as ChildHbfTurnosQuery;
use \HbfVasos as ChildHbfVasos;
use \HbfVasosQuery as ChildHbfVasosQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\HbfComandasTableMap;
use Map\HbfDetallesPedidosTableMap;
use Map\HbfIngresosTableMap;
use Map\HbfVasosTableMap;
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
 * Base class that represents a row from the 'hbf_comandas' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class HbfComandas implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\HbfComandasTableMap';


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
     * The value for the id_comanda field.
     *
     * @var        int
     */
    protected $id_comanda;

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
     * The value for the id_cliente field.
     *
     * @var        int
     */
    protected $id_cliente;

    /**
     * The value for the ids_vasos field.
     *
     * @var        string
     */
    protected $ids_vasos;

    /**
     * The value for the importe field.
     *
     * @var        string
     */
    protected $importe;

    /**
     * The value for the a_cuenta field.
     *
     * @var        string
     */
    protected $a_cuenta;

    /**
     * The value for the saldo field.
     *
     * @var        string
     */
    protected $saldo;

    /**
     * The value for the prioridad field.
     *
     * @var        string
     */
    protected $prioridad;

    /**
     * The value for the hora_entrega field.
     *
     * @var        DateTime
     */
    protected $hora_entrega;

    /**
     * The value for the tipo_consumo field.
     *
     * @var        string
     */
    protected $tipo_consumo;

    /**
     * The value for the comentarios field.
     *
     * @var        string
     */
    protected $comentarios;

    /**
     * The value for the id_ficha_prepago field.
     *
     * @var        int
     */
    protected $id_ficha_prepago;

    /**
     * The value for the pagado field.
     *
     * @var        string
     */
    protected $pagado;

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
     * @var        ChildHbfClubs
     */
    protected $aHbfClubs;

    /**
     * @var        ChildHbfTurnos
     */
    protected $aHbfTurnos;

    /**
     * @var        ChildHbfSesiones
     */
    protected $aHbfSesiones;

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
    protected $aCiUsuariosRelatedByIdCliente;

    /**
     * @var        ChildHbfPrepagos
     */
    protected $aHbfPrepagos;

    /**
     * @var        ObjectCollection|ChildHbfDetallesPedidos[] Collection to store aggregation of ChildHbfDetallesPedidos objects.
     */
    protected $collHbfDetallesPedidoss;
    protected $collHbfDetallesPedidossPartial;

    /**
     * @var        ObjectCollection|ChildHbfIngresos[] Collection to store aggregation of ChildHbfIngresos objects.
     */
    protected $collHbfIngresoss;
    protected $collHbfIngresossPartial;

    /**
     * @var        ObjectCollection|ChildHbfVasos[] Collection to store aggregation of ChildHbfVasos objects.
     */
    protected $collHbfVasoss;
    protected $collHbfVasossPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfDetallesPedidos[]
     */
    protected $hbfDetallesPedidossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfIngresos[]
     */
    protected $hbfIngresossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfVasos[]
     */
    protected $hbfVasossScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->estado = 'ENABLED';
        $this->change_count = 0;
    }

    /**
     * Initializes internal state of Base\HbfComandas object.
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
     * Compares this with another <code>HbfComandas</code> instance.  If
     * <code>obj</code> is an instance of <code>HbfComandas</code>, delegates to
     * <code>equals(HbfComandas)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|HbfComandas The current object, for fluid interface
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
     * Get the [id_comanda] column value.
     *
     * @return int
     */
    public function getIdComanda()
    {
        return $this->id_comanda;
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
     * Get the [id_cliente] column value.
     *
     * @return int
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Get the [ids_vasos] column value.
     *
     * @return string
     */
    public function getIdsVasos()
    {
        return $this->ids_vasos;
    }

    /**
     * Get the [importe] column value.
     *
     * @return string
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Get the [a_cuenta] column value.
     *
     * @return string
     */
    public function getACuenta()
    {
        return $this->a_cuenta;
    }

    /**
     * Get the [saldo] column value.
     *
     * @return string
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Get the [prioridad] column value.
     *
     * @return string
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Get the [optionally formatted] temporal [hora_entrega] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHoraEntrega($format = NULL)
    {
        if ($format === null) {
            return $this->hora_entrega;
        } else {
            return $this->hora_entrega instanceof \DateTimeInterface ? $this->hora_entrega->format($format) : null;
        }
    }

    /**
     * Get the [tipo_consumo] column value.
     *
     * @return string
     */
    public function getTipoConsumo()
    {
        return $this->tipo_consumo;
    }

    /**
     * Get the [comentarios] column value.
     *
     * @return string
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Get the [id_ficha_prepago] column value.
     *
     * @return int
     */
    public function getIdFichaPrepago()
    {
        return $this->id_ficha_prepago;
    }

    /**
     * Get the [pagado] column value.
     *
     * @return string
     */
    public function getPagado()
    {
        return $this->pagado;
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
     * Set the value of [id_comanda] column.
     *
     * @param int $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdComanda($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_comanda !== $v) {
            $this->id_comanda = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_COMANDA] = true;
        }

        return $this;
    } // setIdComanda()

    /**
     * Set the value of [id_club] column.
     *
     * @param int $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdClub($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_club !== $v) {
            $this->id_club = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_CLUB] = true;
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
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdTurno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_turno !== $v) {
            $this->id_turno = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_TURNO] = true;
        }

        if ($this->aHbfTurnos !== null && $this->aHbfTurnos->getIdTurno() !== $v) {
            $this->aHbfTurnos = null;
        }

        return $this;
    } // setIdTurno()

    /**
     * Set the value of [id_sesion] column.
     *
     * @param int $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdSesion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sesion !== $v) {
            $this->id_sesion = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_SESION] = true;
        }

        if ($this->aHbfSesiones !== null && $this->aHbfSesiones->getIdSesion() !== $v) {
            $this->aHbfSesiones = null;
        }

        return $this;
    } // setIdSesion()

    /**
     * Set the value of [id_cliente] column.
     *
     * @param int $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdCliente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_cliente !== $v) {
            $this->id_cliente = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_CLIENTE] = true;
        }

        if ($this->aCiUsuariosRelatedByIdCliente !== null && $this->aCiUsuariosRelatedByIdCliente->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdCliente = null;
        }

        return $this;
    } // setIdCliente()

    /**
     * Set the value of [ids_vasos] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdsVasos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ids_vasos !== $v) {
            $this->ids_vasos = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_IDS_VASOS] = true;
        }

        return $this;
    } // setIdsVasos()

    /**
     * Set the value of [importe] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setImporte($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->importe !== $v) {
            $this->importe = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_IMPORTE] = true;
        }

        return $this;
    } // setImporte()

    /**
     * Set the value of [a_cuenta] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setACuenta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->a_cuenta !== $v) {
            $this->a_cuenta = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_A_CUENTA] = true;
        }

        return $this;
    } // setACuenta()

    /**
     * Set the value of [saldo] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setSaldo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saldo !== $v) {
            $this->saldo = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_SALDO] = true;
        }

        return $this;
    } // setSaldo()

    /**
     * Set the value of [prioridad] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setPrioridad($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prioridad !== $v) {
            $this->prioridad = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_PRIORIDAD] = true;
        }

        return $this;
    } // setPrioridad()

    /**
     * Sets the value of [hora_entrega] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setHoraEntrega($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->hora_entrega !== null || $dt !== null) {
            if ($this->hora_entrega === null || $dt === null || $dt->format("H:i:s.u") !== $this->hora_entrega->format("H:i:s.u")) {
                $this->hora_entrega = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfComandasTableMap::COL_HORA_ENTREGA] = true;
            }
        } // if either are not null

        return $this;
    } // setHoraEntrega()

    /**
     * Set the value of [tipo_consumo] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setTipoConsumo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tipo_consumo !== $v) {
            $this->tipo_consumo = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_TIPO_CONSUMO] = true;
        }

        return $this;
    } // setTipoConsumo()

    /**
     * Set the value of [comentarios] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setComentarios($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comentarios !== $v) {
            $this->comentarios = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_COMENTARIOS] = true;
        }

        return $this;
    } // setComentarios()

    /**
     * Set the value of [id_ficha_prepago] column.
     *
     * @param int $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdFichaPrepago($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_ficha_prepago !== $v) {
            $this->id_ficha_prepago = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_FICHA_PREPAGO] = true;
        }

        if ($this->aHbfPrepagos !== null && $this->aHbfPrepagos->getIdPrepago() !== $v) {
            $this->aHbfPrepagos = null;
        }

        return $this;
    } // setIdFichaPrepago()

    /**
     * Set the value of [pagado] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setPagado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pagado !== $v) {
            $this->pagado = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_PAGADO] = true;
        }

        return $this;
    } // setPagado()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[HbfComandasTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfComandasTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfComandasTableMap::COL_DATE_CREATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : HbfComandasTableMap::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_comanda = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : HbfComandasTableMap::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_club = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : HbfComandasTableMap::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_turno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : HbfComandasTableMap::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sesion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : HbfComandasTableMap::translateFieldName('IdCliente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_cliente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : HbfComandasTableMap::translateFieldName('IdsVasos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ids_vasos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : HbfComandasTableMap::translateFieldName('Importe', TableMap::TYPE_PHPNAME, $indexType)];
            $this->importe = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : HbfComandasTableMap::translateFieldName('ACuenta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->a_cuenta = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : HbfComandasTableMap::translateFieldName('Saldo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saldo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : HbfComandasTableMap::translateFieldName('Prioridad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prioridad = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : HbfComandasTableMap::translateFieldName('HoraEntrega', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hora_entrega = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : HbfComandasTableMap::translateFieldName('TipoConsumo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo_consumo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : HbfComandasTableMap::translateFieldName('Comentarios', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comentarios = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : HbfComandasTableMap::translateFieldName('IdFichaPrepago', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_ficha_prepago = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : HbfComandasTableMap::translateFieldName('Pagado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pagado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : HbfComandasTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : HbfComandasTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : HbfComandasTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : HbfComandasTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : HbfComandasTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : HbfComandasTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = HbfComandasTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\HbfComandas'), 0, $e);
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
        if ($this->aHbfSesiones !== null && $this->id_sesion !== $this->aHbfSesiones->getIdSesion()) {
            $this->aHbfSesiones = null;
        }
        if ($this->aCiUsuariosRelatedByIdCliente !== null && $this->id_cliente !== $this->aCiUsuariosRelatedByIdCliente->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdCliente = null;
        }
        if ($this->aHbfPrepagos !== null && $this->id_ficha_prepago !== $this->aHbfPrepagos->getIdPrepago()) {
            $this->aHbfPrepagos = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(HbfComandasTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildHbfComandasQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aHbfClubs = null;
            $this->aHbfTurnos = null;
            $this->aHbfSesiones = null;
            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aCiUsuariosRelatedByIdCliente = null;
            $this->aHbfPrepagos = null;
            $this->collHbfDetallesPedidoss = null;

            $this->collHbfIngresoss = null;

            $this->collHbfVasoss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see HbfComandas::setDeleted()
     * @see HbfComandas::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfComandasTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildHbfComandasQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfComandasTableMap::DATABASE_NAME);
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
                HbfComandasTableMap::addInstanceToPool($this);
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

            if ($this->aHbfClubs !== null) {
                if ($this->aHbfClubs->isModified() || $this->aHbfClubs->isNew()) {
                    $affectedRows += $this->aHbfClubs->save($con);
                }
                $this->setHbfClubs($this->aHbfClubs);
            }

            if ($this->aHbfTurnos !== null) {
                if ($this->aHbfTurnos->isModified() || $this->aHbfTurnos->isNew()) {
                    $affectedRows += $this->aHbfTurnos->save($con);
                }
                $this->setHbfTurnos($this->aHbfTurnos);
            }

            if ($this->aHbfSesiones !== null) {
                if ($this->aHbfSesiones->isModified() || $this->aHbfSesiones->isNew()) {
                    $affectedRows += $this->aHbfSesiones->save($con);
                }
                $this->setHbfSesiones($this->aHbfSesiones);
            }

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

            if ($this->aCiUsuariosRelatedByIdCliente !== null) {
                if ($this->aCiUsuariosRelatedByIdCliente->isModified() || $this->aCiUsuariosRelatedByIdCliente->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByIdCliente->save($con);
                }
                $this->setCiUsuariosRelatedByIdCliente($this->aCiUsuariosRelatedByIdCliente);
            }

            if ($this->aHbfPrepagos !== null) {
                if ($this->aHbfPrepagos->isModified() || $this->aHbfPrepagos->isNew()) {
                    $affectedRows += $this->aHbfPrepagos->save($con);
                }
                $this->setHbfPrepagos($this->aHbfPrepagos);
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

            if ($this->hbfDetallesPedidossScheduledForDeletion !== null) {
                if (!$this->hbfDetallesPedidossScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfDetallesPedidossScheduledForDeletion as $hbfDetallesPedidos) {
                        // need to save related object because we set the relation to null
                        $hbfDetallesPedidos->save($con);
                    }
                    $this->hbfDetallesPedidossScheduledForDeletion = null;
                }
            }

            if ($this->collHbfDetallesPedidoss !== null) {
                foreach ($this->collHbfDetallesPedidoss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfIngresossScheduledForDeletion !== null) {
                if (!$this->hbfIngresossScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfIngresossScheduledForDeletion as $hbfIngresos) {
                        // need to save related object because we set the relation to null
                        $hbfIngresos->save($con);
                    }
                    $this->hbfIngresossScheduledForDeletion = null;
                }
            }

            if ($this->collHbfIngresoss !== null) {
                foreach ($this->collHbfIngresoss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfVasossScheduledForDeletion !== null) {
                if (!$this->hbfVasossScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfVasossScheduledForDeletion as $hbfVasos) {
                        // need to save related object because we set the relation to null
                        $hbfVasos->save($con);
                    }
                    $this->hbfVasossScheduledForDeletion = null;
                }
            }

            if ($this->collHbfVasoss !== null) {
                foreach ($this->collHbfVasoss as $referrerFK) {
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

        $this->modifiedColumns[HbfComandasTableMap::COL_ID_COMANDA] = true;
        if (null !== $this->id_comanda) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HbfComandasTableMap::COL_ID_COMANDA . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_COMANDA)) {
            $modifiedColumns[':p' . $index++]  = 'id_comanda';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_CLUB)) {
            $modifiedColumns[':p' . $index++]  = 'id_club';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_TURNO)) {
            $modifiedColumns[':p' . $index++]  = 'id_turno';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_SESION)) {
            $modifiedColumns[':p' . $index++]  = 'id_sesion';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_CLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'id_cliente';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_IDS_VASOS)) {
            $modifiedColumns[':p' . $index++]  = 'ids_vasos';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_IMPORTE)) {
            $modifiedColumns[':p' . $index++]  = 'importe';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_A_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = 'a_cuenta';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_SALDO)) {
            $modifiedColumns[':p' . $index++]  = 'saldo';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_PRIORIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'prioridad';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_HORA_ENTREGA)) {
            $modifiedColumns[':p' . $index++]  = 'hora_entrega';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_TIPO_CONSUMO)) {
            $modifiedColumns[':p' . $index++]  = 'tipo_consumo';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_COMENTARIOS)) {
            $modifiedColumns[':p' . $index++]  = 'comentarios';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_FICHA_PREPAGO)) {
            $modifiedColumns[':p' . $index++]  = 'id_ficha_prepago';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_PAGADO)) {
            $modifiedColumns[':p' . $index++]  = 'pagado';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO hbf_comandas (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_comanda':
                        $stmt->bindValue($identifier, $this->id_comanda, PDO::PARAM_INT);
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
                    case 'id_cliente':
                        $stmt->bindValue($identifier, $this->id_cliente, PDO::PARAM_INT);
                        break;
                    case 'ids_vasos':
                        $stmt->bindValue($identifier, $this->ids_vasos, PDO::PARAM_STR);
                        break;
                    case 'importe':
                        $stmt->bindValue($identifier, $this->importe, PDO::PARAM_STR);
                        break;
                    case 'a_cuenta':
                        $stmt->bindValue($identifier, $this->a_cuenta, PDO::PARAM_STR);
                        break;
                    case 'saldo':
                        $stmt->bindValue($identifier, $this->saldo, PDO::PARAM_STR);
                        break;
                    case 'prioridad':
                        $stmt->bindValue($identifier, $this->prioridad, PDO::PARAM_STR);
                        break;
                    case 'hora_entrega':
                        $stmt->bindValue($identifier, $this->hora_entrega ? $this->hora_entrega->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tipo_consumo':
                        $stmt->bindValue($identifier, $this->tipo_consumo, PDO::PARAM_STR);
                        break;
                    case 'comentarios':
                        $stmt->bindValue($identifier, $this->comentarios, PDO::PARAM_STR);
                        break;
                    case 'id_ficha_prepago':
                        $stmt->bindValue($identifier, $this->id_ficha_prepago, PDO::PARAM_INT);
                        break;
                    case 'pagado':
                        $stmt->bindValue($identifier, $this->pagado, PDO::PARAM_STR);
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
        $this->setIdComanda($pk);

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
        $pos = HbfComandasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdComanda();
                break;
            case 1:
                return $this->getIdClub();
                break;
            case 2:
                return $this->getIdTurno();
                break;
            case 3:
                return $this->getIdSesion();
                break;
            case 4:
                return $this->getIdCliente();
                break;
            case 5:
                return $this->getIdsVasos();
                break;
            case 6:
                return $this->getImporte();
                break;
            case 7:
                return $this->getACuenta();
                break;
            case 8:
                return $this->getSaldo();
                break;
            case 9:
                return $this->getPrioridad();
                break;
            case 10:
                return $this->getHoraEntrega();
                break;
            case 11:
                return $this->getTipoConsumo();
                break;
            case 12:
                return $this->getComentarios();
                break;
            case 13:
                return $this->getIdFichaPrepago();
                break;
            case 14:
                return $this->getPagado();
                break;
            case 15:
                return $this->getEstado();
                break;
            case 16:
                return $this->getChangeCount();
                break;
            case 17:
                return $this->getIdUserModified();
                break;
            case 18:
                return $this->getIdUserCreated();
                break;
            case 19:
                return $this->getDateModified();
                break;
            case 20:
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

        if (isset($alreadyDumpedObjects['HbfComandas'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['HbfComandas'][$this->hashCode()] = true;
        $keys = HbfComandasTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdComanda(),
            $keys[1] => $this->getIdClub(),
            $keys[2] => $this->getIdTurno(),
            $keys[3] => $this->getIdSesion(),
            $keys[4] => $this->getIdCliente(),
            $keys[5] => $this->getIdsVasos(),
            $keys[6] => $this->getImporte(),
            $keys[7] => $this->getACuenta(),
            $keys[8] => $this->getSaldo(),
            $keys[9] => $this->getPrioridad(),
            $keys[10] => $this->getHoraEntrega(),
            $keys[11] => $this->getTipoConsumo(),
            $keys[12] => $this->getComentarios(),
            $keys[13] => $this->getIdFichaPrepago(),
            $keys[14] => $this->getPagado(),
            $keys[15] => $this->getEstado(),
            $keys[16] => $this->getChangeCount(),
            $keys[17] => $this->getIdUserModified(),
            $keys[18] => $this->getIdUserCreated(),
            $keys[19] => $this->getDateModified(),
            $keys[20] => $this->getDateCreated(),
        );
        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
            if (null !== $this->aHbfSesiones) {

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

                $result[$key] = $this->aHbfSesiones->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
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
            if (null !== $this->aCiUsuariosRelatedByIdCliente) {

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

                $result[$key] = $this->aCiUsuariosRelatedByIdCliente->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aHbfPrepagos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfPrepagos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_prepagos';
                        break;
                    default:
                        $key = 'HbfPrepagos';
                }

                $result[$key] = $this->aHbfPrepagos->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collHbfDetallesPedidoss) {

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

                $result[$key] = $this->collHbfDetallesPedidoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfIngresoss) {

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

                $result[$key] = $this->collHbfIngresoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfVasoss) {

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

                $result[$key] = $this->collHbfVasoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\HbfComandas
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = HbfComandasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\HbfComandas
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdComanda($value);
                break;
            case 1:
                $this->setIdClub($value);
                break;
            case 2:
                $this->setIdTurno($value);
                break;
            case 3:
                $this->setIdSesion($value);
                break;
            case 4:
                $this->setIdCliente($value);
                break;
            case 5:
                $this->setIdsVasos($value);
                break;
            case 6:
                $this->setImporte($value);
                break;
            case 7:
                $this->setACuenta($value);
                break;
            case 8:
                $this->setSaldo($value);
                break;
            case 9:
                $this->setPrioridad($value);
                break;
            case 10:
                $this->setHoraEntrega($value);
                break;
            case 11:
                $this->setTipoConsumo($value);
                break;
            case 12:
                $this->setComentarios($value);
                break;
            case 13:
                $this->setIdFichaPrepago($value);
                break;
            case 14:
                $this->setPagado($value);
                break;
            case 15:
                $this->setEstado($value);
                break;
            case 16:
                $this->setChangeCount($value);
                break;
            case 17:
                $this->setIdUserModified($value);
                break;
            case 18:
                $this->setIdUserCreated($value);
                break;
            case 19:
                $this->setDateModified($value);
                break;
            case 20:
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
        $keys = HbfComandasTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdComanda($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdClub($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdTurno($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdSesion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIdCliente($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setIdsVasos($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setImporte($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setACuenta($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSaldo($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPrioridad($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setHoraEntrega($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTipoConsumo($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setComentarios($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setIdFichaPrepago($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPagado($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setEstado($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setChangeCount($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setIdUserModified($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setIdUserCreated($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDateModified($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setDateCreated($arr[$keys[20]]);
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
     * @return $this|\HbfComandas The current object, for fluid interface
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
        $criteria = new Criteria(HbfComandasTableMap::DATABASE_NAME);

        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_COMANDA)) {
            $criteria->add(HbfComandasTableMap::COL_ID_COMANDA, $this->id_comanda);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_CLUB)) {
            $criteria->add(HbfComandasTableMap::COL_ID_CLUB, $this->id_club);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_TURNO)) {
            $criteria->add(HbfComandasTableMap::COL_ID_TURNO, $this->id_turno);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_SESION)) {
            $criteria->add(HbfComandasTableMap::COL_ID_SESION, $this->id_sesion);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_CLIENTE)) {
            $criteria->add(HbfComandasTableMap::COL_ID_CLIENTE, $this->id_cliente);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_IDS_VASOS)) {
            $criteria->add(HbfComandasTableMap::COL_IDS_VASOS, $this->ids_vasos);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_IMPORTE)) {
            $criteria->add(HbfComandasTableMap::COL_IMPORTE, $this->importe);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_A_CUENTA)) {
            $criteria->add(HbfComandasTableMap::COL_A_CUENTA, $this->a_cuenta);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_SALDO)) {
            $criteria->add(HbfComandasTableMap::COL_SALDO, $this->saldo);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_PRIORIDAD)) {
            $criteria->add(HbfComandasTableMap::COL_PRIORIDAD, $this->prioridad);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_HORA_ENTREGA)) {
            $criteria->add(HbfComandasTableMap::COL_HORA_ENTREGA, $this->hora_entrega);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_TIPO_CONSUMO)) {
            $criteria->add(HbfComandasTableMap::COL_TIPO_CONSUMO, $this->tipo_consumo);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_COMENTARIOS)) {
            $criteria->add(HbfComandasTableMap::COL_COMENTARIOS, $this->comentarios);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_FICHA_PREPAGO)) {
            $criteria->add(HbfComandasTableMap::COL_ID_FICHA_PREPAGO, $this->id_ficha_prepago);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_PAGADO)) {
            $criteria->add(HbfComandasTableMap::COL_PAGADO, $this->pagado);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ESTADO)) {
            $criteria->add(HbfComandasTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(HbfComandasTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(HbfComandasTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(HbfComandasTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(HbfComandasTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(HbfComandasTableMap::COL_DATE_CREATED)) {
            $criteria->add(HbfComandasTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildHbfComandasQuery::create();
        $criteria->add(HbfComandasTableMap::COL_ID_COMANDA, $this->id_comanda);

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
        $validPk = null !== $this->getIdComanda();

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
        return $this->getIdComanda();
    }

    /**
     * Generic method to set the primary key (id_comanda column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdComanda($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdComanda();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HbfComandas (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdClub($this->getIdClub());
        $copyObj->setIdTurno($this->getIdTurno());
        $copyObj->setIdSesion($this->getIdSesion());
        $copyObj->setIdCliente($this->getIdCliente());
        $copyObj->setIdsVasos($this->getIdsVasos());
        $copyObj->setImporte($this->getImporte());
        $copyObj->setACuenta($this->getACuenta());
        $copyObj->setSaldo($this->getSaldo());
        $copyObj->setPrioridad($this->getPrioridad());
        $copyObj->setHoraEntrega($this->getHoraEntrega());
        $copyObj->setTipoConsumo($this->getTipoConsumo());
        $copyObj->setComentarios($this->getComentarios());
        $copyObj->setIdFichaPrepago($this->getIdFichaPrepago());
        $copyObj->setPagado($this->getPagado());
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

            foreach ($this->getHbfDetallesPedidoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfDetallesPedidos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfIngresoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfIngresos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfVasoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfVasos($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdComanda(NULL); // this is a auto-increment column, so set to default value
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
     * @return \HbfComandas Clone of current object.
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
     * Declares an association between this object and a ChildHbfClubs object.
     *
     * @param  ChildHbfClubs $v
     * @return $this|\HbfComandas The current object (for fluent API support)
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
            $v->addHbfComandas($this);
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
                $this->aHbfClubs->addHbfComandass($this);
             */
        }

        return $this->aHbfClubs;
    }

    /**
     * Declares an association between this object and a ChildHbfTurnos object.
     *
     * @param  ChildHbfTurnos $v
     * @return $this|\HbfComandas The current object (for fluent API support)
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
            $v->addHbfComandas($this);
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
                $this->aHbfTurnos->addHbfComandass($this);
             */
        }

        return $this->aHbfTurnos;
    }

    /**
     * Declares an association between this object and a ChildHbfSesiones object.
     *
     * @param  ChildHbfSesiones $v
     * @return $this|\HbfComandas The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfSesiones(ChildHbfSesiones $v = null)
    {
        if ($v === null) {
            $this->setIdSesion(NULL);
        } else {
            $this->setIdSesion($v->getIdSesion());
        }

        $this->aHbfSesiones = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfSesiones object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfComandas($this);
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
    public function getHbfSesiones(ConnectionInterface $con = null)
    {
        if ($this->aHbfSesiones === null && ($this->id_sesion != 0)) {
            $this->aHbfSesiones = ChildHbfSesionesQuery::create()->findPk($this->id_sesion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfSesiones->addHbfComandass($this);
             */
        }

        return $this->aHbfSesiones;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfComandas The current object (for fluent API support)
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
            $v->addHbfComandasRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addHbfComandassRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfComandas The current object (for fluent API support)
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
            $v->addHbfComandasRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addHbfComandassRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfComandas The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiUsuariosRelatedByIdCliente(ChildCiUsuarios $v = null)
    {
        if ($v === null) {
            $this->setIdCliente(NULL);
        } else {
            $this->setIdCliente($v->getIdUsuario());
        }

        $this->aCiUsuariosRelatedByIdCliente = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiUsuarios object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfComandasRelatedByIdCliente($this);
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
    public function getCiUsuariosRelatedByIdCliente(ConnectionInterface $con = null)
    {
        if ($this->aCiUsuariosRelatedByIdCliente === null && ($this->id_cliente != 0)) {
            $this->aCiUsuariosRelatedByIdCliente = ChildCiUsuariosQuery::create()->findPk($this->id_cliente, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiUsuariosRelatedByIdCliente->addHbfComandassRelatedByIdCliente($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdCliente;
    }

    /**
     * Declares an association between this object and a ChildHbfPrepagos object.
     *
     * @param  ChildHbfPrepagos $v
     * @return $this|\HbfComandas The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfPrepagos(ChildHbfPrepagos $v = null)
    {
        if ($v === null) {
            $this->setIdFichaPrepago(NULL);
        } else {
            $this->setIdFichaPrepago($v->getIdPrepago());
        }

        $this->aHbfPrepagos = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfPrepagos object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfComandas($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildHbfPrepagos object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildHbfPrepagos The associated ChildHbfPrepagos object.
     * @throws PropelException
     */
    public function getHbfPrepagos(ConnectionInterface $con = null)
    {
        if ($this->aHbfPrepagos === null && ($this->id_ficha_prepago != 0)) {
            $this->aHbfPrepagos = ChildHbfPrepagosQuery::create()->findPk($this->id_ficha_prepago, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfPrepagos->addHbfComandass($this);
             */
        }

        return $this->aHbfPrepagos;
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
        if ('HbfDetallesPedidos' == $relationName) {
            $this->initHbfDetallesPedidoss();
            return;
        }
        if ('HbfIngresos' == $relationName) {
            $this->initHbfIngresoss();
            return;
        }
        if ('HbfVasos' == $relationName) {
            $this->initHbfVasoss();
            return;
        }
    }

    /**
     * Clears out the collHbfDetallesPedidoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfDetallesPedidoss()
     */
    public function clearHbfDetallesPedidoss()
    {
        $this->collHbfDetallesPedidoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfDetallesPedidoss collection loaded partially.
     */
    public function resetPartialHbfDetallesPedidoss($v = true)
    {
        $this->collHbfDetallesPedidossPartial = $v;
    }

    /**
     * Initializes the collHbfDetallesPedidoss collection.
     *
     * By default this just sets the collHbfDetallesPedidoss collection to an empty array (like clearcollHbfDetallesPedidoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfDetallesPedidoss($overrideExisting = true)
    {
        if (null !== $this->collHbfDetallesPedidoss && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfDetallesPedidosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfDetallesPedidoss = new $collectionClassName;
        $this->collHbfDetallesPedidoss->setModel('\HbfDetallesPedidos');
    }

    /**
     * Gets an array of ChildHbfDetallesPedidos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfComandas is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     * @throws PropelException
     */
    public function getHbfDetallesPedidoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfDetallesPedidossPartial && !$this->isNew();
        if (null === $this->collHbfDetallesPedidoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfDetallesPedidoss) {
                // return empty collection
                $this->initHbfDetallesPedidoss();
            } else {
                $collHbfDetallesPedidoss = ChildHbfDetallesPedidosQuery::create(null, $criteria)
                    ->filterByHbfComandas($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfDetallesPedidossPartial && count($collHbfDetallesPedidoss)) {
                        $this->initHbfDetallesPedidoss(false);

                        foreach ($collHbfDetallesPedidoss as $obj) {
                            if (false == $this->collHbfDetallesPedidoss->contains($obj)) {
                                $this->collHbfDetallesPedidoss->append($obj);
                            }
                        }

                        $this->collHbfDetallesPedidossPartial = true;
                    }

                    return $collHbfDetallesPedidoss;
                }

                if ($partial && $this->collHbfDetallesPedidoss) {
                    foreach ($this->collHbfDetallesPedidoss as $obj) {
                        if ($obj->isNew()) {
                            $collHbfDetallesPedidoss[] = $obj;
                        }
                    }
                }

                $this->collHbfDetallesPedidoss = $collHbfDetallesPedidoss;
                $this->collHbfDetallesPedidossPartial = false;
            }
        }

        return $this->collHbfDetallesPedidoss;
    }

    /**
     * Sets a collection of ChildHbfDetallesPedidos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfDetallesPedidoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfComandas The current object (for fluent API support)
     */
    public function setHbfDetallesPedidoss(Collection $hbfDetallesPedidoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfDetallesPedidos[] $hbfDetallesPedidossToDelete */
        $hbfDetallesPedidossToDelete = $this->getHbfDetallesPedidoss(new Criteria(), $con)->diff($hbfDetallesPedidoss);


        $this->hbfDetallesPedidossScheduledForDeletion = $hbfDetallesPedidossToDelete;

        foreach ($hbfDetallesPedidossToDelete as $hbfDetallesPedidosRemoved) {
            $hbfDetallesPedidosRemoved->setHbfComandas(null);
        }

        $this->collHbfDetallesPedidoss = null;
        foreach ($hbfDetallesPedidoss as $hbfDetallesPedidos) {
            $this->addHbfDetallesPedidos($hbfDetallesPedidos);
        }

        $this->collHbfDetallesPedidoss = $hbfDetallesPedidoss;
        $this->collHbfDetallesPedidossPartial = false;

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
    public function countHbfDetallesPedidoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfDetallesPedidossPartial && !$this->isNew();
        if (null === $this->collHbfDetallesPedidoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfDetallesPedidoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfDetallesPedidoss());
            }

            $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfComandas($this)
                ->count($con);
        }

        return count($this->collHbfDetallesPedidoss);
    }

    /**
     * Method called to associate a ChildHbfDetallesPedidos object to this object
     * through the ChildHbfDetallesPedidos foreign key attribute.
     *
     * @param  ChildHbfDetallesPedidos $l ChildHbfDetallesPedidos
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function addHbfDetallesPedidos(ChildHbfDetallesPedidos $l)
    {
        if ($this->collHbfDetallesPedidoss === null) {
            $this->initHbfDetallesPedidoss();
            $this->collHbfDetallesPedidossPartial = true;
        }

        if (!$this->collHbfDetallesPedidoss->contains($l)) {
            $this->doAddHbfDetallesPedidos($l);

            if ($this->hbfDetallesPedidossScheduledForDeletion and $this->hbfDetallesPedidossScheduledForDeletion->contains($l)) {
                $this->hbfDetallesPedidossScheduledForDeletion->remove($this->hbfDetallesPedidossScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfDetallesPedidos $hbfDetallesPedidos The ChildHbfDetallesPedidos object to add.
     */
    protected function doAddHbfDetallesPedidos(ChildHbfDetallesPedidos $hbfDetallesPedidos)
    {
        $this->collHbfDetallesPedidoss[]= $hbfDetallesPedidos;
        $hbfDetallesPedidos->setHbfComandas($this);
    }

    /**
     * @param  ChildHbfDetallesPedidos $hbfDetallesPedidos The ChildHbfDetallesPedidos object to remove.
     * @return $this|ChildHbfComandas The current object (for fluent API support)
     */
    public function removeHbfDetallesPedidos(ChildHbfDetallesPedidos $hbfDetallesPedidos)
    {
        if ($this->getHbfDetallesPedidoss()->contains($hbfDetallesPedidos)) {
            $pos = $this->collHbfDetallesPedidoss->search($hbfDetallesPedidos);
            $this->collHbfDetallesPedidoss->remove($pos);
            if (null === $this->hbfDetallesPedidossScheduledForDeletion) {
                $this->hbfDetallesPedidossScheduledForDeletion = clone $this->collHbfDetallesPedidoss;
                $this->hbfDetallesPedidossScheduledForDeletion->clear();
            }
            $this->hbfDetallesPedidossScheduledForDeletion[]= $hbfDetallesPedidos;
            $hbfDetallesPedidos->setHbfComandas(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfDetallesPedidoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfDetallesPedidoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfDetallesPedidoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossJoinHbfVasos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfVasos', $joinBehavior);

        return $this->getHbfDetallesPedidoss($query, $con);
    }

    /**
     * Clears out the collHbfIngresoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfIngresoss()
     */
    public function clearHbfIngresoss()
    {
        $this->collHbfIngresoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfIngresoss collection loaded partially.
     */
    public function resetPartialHbfIngresoss($v = true)
    {
        $this->collHbfIngresossPartial = $v;
    }

    /**
     * Initializes the collHbfIngresoss collection.
     *
     * By default this just sets the collHbfIngresoss collection to an empty array (like clearcollHbfIngresoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfIngresoss($overrideExisting = true)
    {
        if (null !== $this->collHbfIngresoss && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfIngresosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfIngresoss = new $collectionClassName;
        $this->collHbfIngresoss->setModel('\HbfIngresos');
    }

    /**
     * Gets an array of ChildHbfIngresos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfComandas is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     * @throws PropelException
     */
    public function getHbfIngresoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossPartial && !$this->isNew();
        if (null === $this->collHbfIngresoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresoss) {
                // return empty collection
                $this->initHbfIngresoss();
            } else {
                $collHbfIngresoss = ChildHbfIngresosQuery::create(null, $criteria)
                    ->filterByHbfComandas($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfIngresossPartial && count($collHbfIngresoss)) {
                        $this->initHbfIngresoss(false);

                        foreach ($collHbfIngresoss as $obj) {
                            if (false == $this->collHbfIngresoss->contains($obj)) {
                                $this->collHbfIngresoss->append($obj);
                            }
                        }

                        $this->collHbfIngresossPartial = true;
                    }

                    return $collHbfIngresoss;
                }

                if ($partial && $this->collHbfIngresoss) {
                    foreach ($this->collHbfIngresoss as $obj) {
                        if ($obj->isNew()) {
                            $collHbfIngresoss[] = $obj;
                        }
                    }
                }

                $this->collHbfIngresoss = $collHbfIngresoss;
                $this->collHbfIngresossPartial = false;
            }
        }

        return $this->collHbfIngresoss;
    }

    /**
     * Sets a collection of ChildHbfIngresos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfIngresoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfComandas The current object (for fluent API support)
     */
    public function setHbfIngresoss(Collection $hbfIngresoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfIngresos[] $hbfIngresossToDelete */
        $hbfIngresossToDelete = $this->getHbfIngresoss(new Criteria(), $con)->diff($hbfIngresoss);


        $this->hbfIngresossScheduledForDeletion = $hbfIngresossToDelete;

        foreach ($hbfIngresossToDelete as $hbfIngresosRemoved) {
            $hbfIngresosRemoved->setHbfComandas(null);
        }

        $this->collHbfIngresoss = null;
        foreach ($hbfIngresoss as $hbfIngresos) {
            $this->addHbfIngresos($hbfIngresos);
        }

        $this->collHbfIngresoss = $hbfIngresoss;
        $this->collHbfIngresossPartial = false;

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
    public function countHbfIngresoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfIngresossPartial && !$this->isNew();
        if (null === $this->collHbfIngresoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfIngresoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfIngresoss());
            }

            $query = ChildHbfIngresosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfComandas($this)
                ->count($con);
        }

        return count($this->collHbfIngresoss);
    }

    /**
     * Method called to associate a ChildHbfIngresos object to this object
     * through the ChildHbfIngresos foreign key attribute.
     *
     * @param  ChildHbfIngresos $l ChildHbfIngresos
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function addHbfIngresos(ChildHbfIngresos $l)
    {
        if ($this->collHbfIngresoss === null) {
            $this->initHbfIngresoss();
            $this->collHbfIngresossPartial = true;
        }

        if (!$this->collHbfIngresoss->contains($l)) {
            $this->doAddHbfIngresos($l);

            if ($this->hbfIngresossScheduledForDeletion and $this->hbfIngresossScheduledForDeletion->contains($l)) {
                $this->hbfIngresossScheduledForDeletion->remove($this->hbfIngresossScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfIngresos $hbfIngresos The ChildHbfIngresos object to add.
     */
    protected function doAddHbfIngresos(ChildHbfIngresos $hbfIngresos)
    {
        $this->collHbfIngresoss[]= $hbfIngresos;
        $hbfIngresos->setHbfComandas($this);
    }

    /**
     * @param  ChildHbfIngresos $hbfIngresos The ChildHbfIngresos object to remove.
     * @return $this|ChildHbfComandas The current object (for fluent API support)
     */
    public function removeHbfIngresos(ChildHbfIngresos $hbfIngresos)
    {
        if ($this->getHbfIngresoss()->contains($hbfIngresos)) {
            $pos = $this->collHbfIngresoss->search($hbfIngresos);
            $this->collHbfIngresoss->remove($pos);
            if (null === $this->hbfIngresossScheduledForDeletion) {
                $this->hbfIngresossScheduledForDeletion = clone $this->collHbfIngresoss;
                $this->hbfIngresossScheduledForDeletion->clear();
            }
            $this->hbfIngresossScheduledForDeletion[]= $hbfIngresos;
            $hbfIngresos->setHbfComandas(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfIngresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfIngresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossJoinCiUsuariosRelatedByIdCliente(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdCliente', $joinBehavior);

        return $this->getHbfIngresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossJoinHbfProductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfProductos', $joinBehavior);

        return $this->getHbfIngresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossJoinHbfPrepagos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfPrepagos', $joinBehavior);

        return $this->getHbfIngresoss($query, $con);
    }

    /**
     * Clears out the collHbfVasoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfVasoss()
     */
    public function clearHbfVasoss()
    {
        $this->collHbfVasoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfVasoss collection loaded partially.
     */
    public function resetPartialHbfVasoss($v = true)
    {
        $this->collHbfVasossPartial = $v;
    }

    /**
     * Initializes the collHbfVasoss collection.
     *
     * By default this just sets the collHbfVasoss collection to an empty array (like clearcollHbfVasoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfVasoss($overrideExisting = true)
    {
        if (null !== $this->collHbfVasoss && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfVasosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfVasoss = new $collectionClassName;
        $this->collHbfVasoss->setModel('\HbfVasos');
    }

    /**
     * Gets an array of ChildHbfVasos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfComandas is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     * @throws PropelException
     */
    public function getHbfVasoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVasossPartial && !$this->isNew();
        if (null === $this->collHbfVasoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfVasoss) {
                // return empty collection
                $this->initHbfVasoss();
            } else {
                $collHbfVasoss = ChildHbfVasosQuery::create(null, $criteria)
                    ->filterByHbfComandas($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfVasossPartial && count($collHbfVasoss)) {
                        $this->initHbfVasoss(false);

                        foreach ($collHbfVasoss as $obj) {
                            if (false == $this->collHbfVasoss->contains($obj)) {
                                $this->collHbfVasoss->append($obj);
                            }
                        }

                        $this->collHbfVasossPartial = true;
                    }

                    return $collHbfVasoss;
                }

                if ($partial && $this->collHbfVasoss) {
                    foreach ($this->collHbfVasoss as $obj) {
                        if ($obj->isNew()) {
                            $collHbfVasoss[] = $obj;
                        }
                    }
                }

                $this->collHbfVasoss = $collHbfVasoss;
                $this->collHbfVasossPartial = false;
            }
        }

        return $this->collHbfVasoss;
    }

    /**
     * Sets a collection of ChildHbfVasos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfVasoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfComandas The current object (for fluent API support)
     */
    public function setHbfVasoss(Collection $hbfVasoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVasos[] $hbfVasossToDelete */
        $hbfVasossToDelete = $this->getHbfVasoss(new Criteria(), $con)->diff($hbfVasoss);


        $this->hbfVasossScheduledForDeletion = $hbfVasossToDelete;

        foreach ($hbfVasossToDelete as $hbfVasosRemoved) {
            $hbfVasosRemoved->setHbfComandas(null);
        }

        $this->collHbfVasoss = null;
        foreach ($hbfVasoss as $hbfVasos) {
            $this->addHbfVasos($hbfVasos);
        }

        $this->collHbfVasoss = $hbfVasoss;
        $this->collHbfVasossPartial = false;

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
    public function countHbfVasoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfVasossPartial && !$this->isNew();
        if (null === $this->collHbfVasoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfVasoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfVasoss());
            }

            $query = ChildHbfVasosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfComandas($this)
                ->count($con);
        }

        return count($this->collHbfVasoss);
    }

    /**
     * Method called to associate a ChildHbfVasos object to this object
     * through the ChildHbfVasos foreign key attribute.
     *
     * @param  ChildHbfVasos $l ChildHbfVasos
     * @return $this|\HbfComandas The current object (for fluent API support)
     */
    public function addHbfVasos(ChildHbfVasos $l)
    {
        if ($this->collHbfVasoss === null) {
            $this->initHbfVasoss();
            $this->collHbfVasossPartial = true;
        }

        if (!$this->collHbfVasoss->contains($l)) {
            $this->doAddHbfVasos($l);

            if ($this->hbfVasossScheduledForDeletion and $this->hbfVasossScheduledForDeletion->contains($l)) {
                $this->hbfVasossScheduledForDeletion->remove($this->hbfVasossScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfVasos $hbfVasos The ChildHbfVasos object to add.
     */
    protected function doAddHbfVasos(ChildHbfVasos $hbfVasos)
    {
        $this->collHbfVasoss[]= $hbfVasos;
        $hbfVasos->setHbfComandas($this);
    }

    /**
     * @param  ChildHbfVasos $hbfVasos The ChildHbfVasos object to remove.
     * @return $this|ChildHbfComandas The current object (for fluent API support)
     */
    public function removeHbfVasos(ChildHbfVasos $hbfVasos)
    {
        if ($this->getHbfVasoss()->contains($hbfVasos)) {
            $pos = $this->collHbfVasoss->search($hbfVasos);
            $this->collHbfVasoss->remove($pos);
            if (null === $this->hbfVasossScheduledForDeletion) {
                $this->hbfVasossScheduledForDeletion = clone $this->collHbfVasoss;
                $this->hbfVasossScheduledForDeletion->clear();
            }
            $this->hbfVasossScheduledForDeletion[]= $hbfVasos;
            $hbfVasos->setHbfComandas(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfVasoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfVasoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfComandas is new, it will return
     * an empty collection; or if this HbfComandas has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfComandas.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossJoinCiOptions(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('CiOptions', $joinBehavior);

        return $this->getHbfVasoss($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aHbfClubs) {
            $this->aHbfClubs->removeHbfComandas($this);
        }
        if (null !== $this->aHbfTurnos) {
            $this->aHbfTurnos->removeHbfComandas($this);
        }
        if (null !== $this->aHbfSesiones) {
            $this->aHbfSesiones->removeHbfComandas($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {
            $this->aCiUsuariosRelatedByIdUserCreated->removeHbfComandasRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeHbfComandasRelatedByIdUserModified($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdCliente) {
            $this->aCiUsuariosRelatedByIdCliente->removeHbfComandasRelatedByIdCliente($this);
        }
        if (null !== $this->aHbfPrepagos) {
            $this->aHbfPrepagos->removeHbfComandas($this);
        }
        $this->id_comanda = null;
        $this->id_club = null;
        $this->id_turno = null;
        $this->id_sesion = null;
        $this->id_cliente = null;
        $this->ids_vasos = null;
        $this->importe = null;
        $this->a_cuenta = null;
        $this->saldo = null;
        $this->prioridad = null;
        $this->hora_entrega = null;
        $this->tipo_consumo = null;
        $this->comentarios = null;
        $this->id_ficha_prepago = null;
        $this->pagado = null;
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
            if ($this->collHbfDetallesPedidoss) {
                foreach ($this->collHbfDetallesPedidoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfIngresoss) {
                foreach ($this->collHbfIngresoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVasoss) {
                foreach ($this->collHbfVasoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collHbfDetallesPedidoss = null;
        $this->collHbfIngresoss = null;
        $this->collHbfVasoss = null;
        $this->aHbfClubs = null;
        $this->aHbfTurnos = null;
        $this->aHbfSesiones = null;
        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
        $this->aCiUsuariosRelatedByIdCliente = null;
        $this->aHbfPrepagos = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(HbfComandasTableMap::DEFAULT_STRING_FORMAT);
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
