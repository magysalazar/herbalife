<?php

namespace Base;

use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \HbfClubs as ChildHbfClubs;
use \HbfClubsQuery as ChildHbfClubsQuery;
use \HbfProductos as ChildHbfProductos;
use \HbfProductosQuery as ChildHbfProductosQuery;
use \HbfSesiones as ChildHbfSesiones;
use \HbfSesionesQuery as ChildHbfSesionesQuery;
use \HbfTurnos as ChildHbfTurnos;
use \HbfTurnosQuery as ChildHbfTurnosQuery;
use \HbfVentasQuery as ChildHbfVentasQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\HbfVentasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'hbf_ventas' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class HbfVentas implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\HbfVentasTableMap';


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
     * The value for the id_venta field.
     *
     * @var        int
     */
    protected $id_venta;

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
     * The value for the fecha_venta field.
     *
     * @var        DateTime
     */
    protected $fecha_venta;

    /**
     * The value for the id_producto field.
     *
     * @var        int
     */
    protected $id_producto;

    /**
     * The value for the precio field.
     *
     * @var        string
     */
    protected $precio;

    /**
     * The value for the observaciones field.
     *
     * @var        string
     */
    protected $observaciones;

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
     * The value for the entregado field.
     *
     * @var        string
     */
    protected $entregado;

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
     * @var        int
     */
    protected $date_modified;

    /**
     * The value for the date_created field.
     *
     * @var        int
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
    protected $aCiUsuariosRelatedByIdCliente;

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
     * @var        ChildHbfProductos
     */
    protected $aHbfProductos;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

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
     * Initializes internal state of Base\HbfVentas object.
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
     * Compares this with another <code>HbfVentas</code> instance.  If
     * <code>obj</code> is an instance of <code>HbfVentas</code>, delegates to
     * <code>equals(HbfVentas)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|HbfVentas The current object, for fluid interface
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
     * Get the [id_venta] column value.
     *
     * @return int
     */
    public function getIdVenta()
    {
        return $this->id_venta;
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
     * Get the [optionally formatted] temporal [fecha_venta] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaVenta($format = NULL)
    {
        if ($format === null) {
            return $this->fecha_venta;
        } else {
            return $this->fecha_venta instanceof \DateTimeInterface ? $this->fecha_venta->format($format) : null;
        }
    }

    /**
     * Get the [id_producto] column value.
     *
     * @return int
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * Get the [precio] column value.
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
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
     * Get the [entregado] column value.
     *
     * @return string
     */
    public function getEntregado()
    {
        return $this->entregado;
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
     * Get the [date_modified] column value.
     *
     * @return int
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }

    /**
     * Get the [date_created] column value.
     *
     * @return int
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set the value of [id_venta] column.
     *
     * @param int $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdVenta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_venta !== $v) {
            $this->id_venta = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_VENTA] = true;
        }

        return $this;
    } // setIdVenta()

    /**
     * Set the value of [id_club] column.
     *
     * @param int $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdClub($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_club !== $v) {
            $this->id_club = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_CLUB] = true;
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
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdTurno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_turno !== $v) {
            $this->id_turno = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_TURNO] = true;
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
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdSesion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sesion !== $v) {
            $this->id_sesion = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_SESION] = true;
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
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdCliente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_cliente !== $v) {
            $this->id_cliente = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_CLIENTE] = true;
        }

        if ($this->aCiUsuariosRelatedByIdCliente !== null && $this->aCiUsuariosRelatedByIdCliente->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdCliente = null;
        }

        return $this;
    } // setIdCliente()

    /**
     * Sets the value of [fecha_venta] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setFechaVenta($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_venta !== null || $dt !== null) {
            if ($this->fecha_venta === null || $dt === null || $dt->format("Y-m-d") !== $this->fecha_venta->format("Y-m-d")) {
                $this->fecha_venta = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfVentasTableMap::COL_FECHA_VENTA] = true;
            }
        } // if either are not null

        return $this;
    } // setFechaVenta()

    /**
     * Set the value of [id_producto] column.
     *
     * @param int $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdProducto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_producto !== $v) {
            $this->id_producto = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_PRODUCTO] = true;
        }

        if ($this->aHbfProductos !== null && $this->aHbfProductos->getIdProducto() !== $v) {
            $this->aHbfProductos = null;
        }

        return $this;
    } // setIdProducto()

    /**
     * Set the value of [precio] column.
     *
     * @param string $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setPrecio($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->precio !== $v) {
            $this->precio = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_PRECIO] = true;
        }

        return $this;
    } // setPrecio()

    /**
     * Set the value of [observaciones] column.
     *
     * @param string $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setObservaciones($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->observaciones !== $v) {
            $this->observaciones = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_OBSERVACIONES] = true;
        }

        return $this;
    } // setObservaciones()

    /**
     * Set the value of [a_cuenta] column.
     *
     * @param string $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setACuenta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->a_cuenta !== $v) {
            $this->a_cuenta = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_A_CUENTA] = true;
        }

        return $this;
    } // setACuenta()

    /**
     * Set the value of [saldo] column.
     *
     * @param string $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setSaldo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saldo !== $v) {
            $this->saldo = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_SALDO] = true;
        }

        return $this;
    } // setSaldo()

    /**
     * Set the value of [entregado] column.
     *
     * @param string $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setEntregado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->entregado !== $v) {
            $this->entregado = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ENTREGADO] = true;
        }

        return $this;
    } // setEntregado()

    /**
     * Set the value of [pagado] column.
     *
     * @param string $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setPagado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pagado !== $v) {
            $this->pagado = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_PAGADO] = true;
        }

        return $this;
    } // setPagado()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_ID_USER_CREATED] = true;
        }

        if ($this->aCiUsuariosRelatedByIdUserCreated !== null && $this->aCiUsuariosRelatedByIdUserCreated->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdUserCreated = null;
        }

        return $this;
    } // setIdUserCreated()

    /**
     * Set the value of [date_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date_modified !== $v) {
            $this->date_modified = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_DATE_MODIFIED] = true;
        }

        return $this;
    } // setDateModified()

    /**
     * Set the value of [date_created] column.
     *
     * @param int $v new value
     * @return $this|\HbfVentas The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date_created !== $v) {
            $this->date_created = $v;
            $this->modifiedColumns[HbfVentasTableMap::COL_DATE_CREATED] = true;
        }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : HbfVentasTableMap::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_venta = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : HbfVentasTableMap::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_club = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : HbfVentasTableMap::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_turno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : HbfVentasTableMap::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sesion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : HbfVentasTableMap::translateFieldName('IdCliente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_cliente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : HbfVentasTableMap::translateFieldName('FechaVenta', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fecha_venta = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : HbfVentasTableMap::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_producto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : HbfVentasTableMap::translateFieldName('Precio', TableMap::TYPE_PHPNAME, $indexType)];
            $this->precio = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : HbfVentasTableMap::translateFieldName('Observaciones', TableMap::TYPE_PHPNAME, $indexType)];
            $this->observaciones = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : HbfVentasTableMap::translateFieldName('ACuenta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->a_cuenta = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : HbfVentasTableMap::translateFieldName('Saldo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saldo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : HbfVentasTableMap::translateFieldName('Entregado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->entregado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : HbfVentasTableMap::translateFieldName('Pagado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pagado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : HbfVentasTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : HbfVentasTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : HbfVentasTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : HbfVentasTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : HbfVentasTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : HbfVentasTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date_created = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = HbfVentasTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\HbfVentas'), 0, $e);
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
        if ($this->aHbfProductos !== null && $this->id_producto !== $this->aHbfProductos->getIdProducto()) {
            $this->aHbfProductos = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(HbfVentasTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildHbfVentasQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aCiUsuariosRelatedByIdCliente = null;
            $this->aHbfClubs = null;
            $this->aHbfTurnos = null;
            $this->aHbfSesiones = null;
            $this->aHbfProductos = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see HbfVentas::setDeleted()
     * @see HbfVentas::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVentasTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildHbfVentasQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVentasTableMap::DATABASE_NAME);
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
                HbfVentasTableMap::addInstanceToPool($this);
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

            if ($this->aCiUsuariosRelatedByIdCliente !== null) {
                if ($this->aCiUsuariosRelatedByIdCliente->isModified() || $this->aCiUsuariosRelatedByIdCliente->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByIdCliente->save($con);
                }
                $this->setCiUsuariosRelatedByIdCliente($this->aCiUsuariosRelatedByIdCliente);
            }

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

            if ($this->aHbfProductos !== null) {
                if ($this->aHbfProductos->isModified() || $this->aHbfProductos->isNew()) {
                    $affectedRows += $this->aHbfProductos->save($con);
                }
                $this->setHbfProductos($this->aHbfProductos);
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

        $this->modifiedColumns[HbfVentasTableMap::COL_ID_VENTA] = true;
        if (null !== $this->id_venta) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HbfVentasTableMap::COL_ID_VENTA . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_VENTA)) {
            $modifiedColumns[':p' . $index++]  = 'id_venta';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_CLUB)) {
            $modifiedColumns[':p' . $index++]  = 'id_club';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_TURNO)) {
            $modifiedColumns[':p' . $index++]  = 'id_turno';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_SESION)) {
            $modifiedColumns[':p' . $index++]  = 'id_sesion';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_CLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'id_cliente';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_FECHA_VENTA)) {
            $modifiedColumns[':p' . $index++]  = 'fecha_venta';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_PRODUCTO)) {
            $modifiedColumns[':p' . $index++]  = 'id_producto';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_PRECIO)) {
            $modifiedColumns[':p' . $index++]  = 'precio';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_OBSERVACIONES)) {
            $modifiedColumns[':p' . $index++]  = 'observaciones';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_A_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = 'a_cuenta';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_SALDO)) {
            $modifiedColumns[':p' . $index++]  = 'saldo';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ENTREGADO)) {
            $modifiedColumns[':p' . $index++]  = 'entregado';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_PAGADO)) {
            $modifiedColumns[':p' . $index++]  = 'pagado';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO hbf_ventas (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_venta':
                        $stmt->bindValue($identifier, $this->id_venta, PDO::PARAM_INT);
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
                    case 'fecha_venta':
                        $stmt->bindValue($identifier, $this->fecha_venta ? $this->fecha_venta->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'id_producto':
                        $stmt->bindValue($identifier, $this->id_producto, PDO::PARAM_INT);
                        break;
                    case 'precio':
                        $stmt->bindValue($identifier, $this->precio, PDO::PARAM_STR);
                        break;
                    case 'observaciones':
                        $stmt->bindValue($identifier, $this->observaciones, PDO::PARAM_STR);
                        break;
                    case 'a_cuenta':
                        $stmt->bindValue($identifier, $this->a_cuenta, PDO::PARAM_STR);
                        break;
                    case 'saldo':
                        $stmt->bindValue($identifier, $this->saldo, PDO::PARAM_STR);
                        break;
                    case 'entregado':
                        $stmt->bindValue($identifier, $this->entregado, PDO::PARAM_STR);
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
                        $stmt->bindValue($identifier, $this->date_modified, PDO::PARAM_INT);
                        break;
                    case 'date_created':
                        $stmt->bindValue($identifier, $this->date_created, PDO::PARAM_INT);
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
        $this->setIdVenta($pk);

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
        $pos = HbfVentasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdVenta();
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
                return $this->getFechaVenta();
                break;
            case 6:
                return $this->getIdProducto();
                break;
            case 7:
                return $this->getPrecio();
                break;
            case 8:
                return $this->getObservaciones();
                break;
            case 9:
                return $this->getACuenta();
                break;
            case 10:
                return $this->getSaldo();
                break;
            case 11:
                return $this->getEntregado();
                break;
            case 12:
                return $this->getPagado();
                break;
            case 13:
                return $this->getEstado();
                break;
            case 14:
                return $this->getChangeCount();
                break;
            case 15:
                return $this->getIdUserModified();
                break;
            case 16:
                return $this->getIdUserCreated();
                break;
            case 17:
                return $this->getDateModified();
                break;
            case 18:
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

        if (isset($alreadyDumpedObjects['HbfVentas'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['HbfVentas'][$this->hashCode()] = true;
        $keys = HbfVentasTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdVenta(),
            $keys[1] => $this->getIdClub(),
            $keys[2] => $this->getIdTurno(),
            $keys[3] => $this->getIdSesion(),
            $keys[4] => $this->getIdCliente(),
            $keys[5] => $this->getFechaVenta(),
            $keys[6] => $this->getIdProducto(),
            $keys[7] => $this->getPrecio(),
            $keys[8] => $this->getObservaciones(),
            $keys[9] => $this->getACuenta(),
            $keys[10] => $this->getSaldo(),
            $keys[11] => $this->getEntregado(),
            $keys[12] => $this->getPagado(),
            $keys[13] => $this->getEstado(),
            $keys[14] => $this->getChangeCount(),
            $keys[15] => $this->getIdUserModified(),
            $keys[16] => $this->getIdUserCreated(),
            $keys[17] => $this->getDateModified(),
            $keys[18] => $this->getDateCreated(),
        );
        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
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
            if (null !== $this->aHbfProductos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hbfProductos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hbf_productos';
                        break;
                    default:
                        $key = 'HbfProductos';
                }

                $result[$key] = $this->aHbfProductos->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\HbfVentas
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = HbfVentasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\HbfVentas
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdVenta($value);
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
                $this->setFechaVenta($value);
                break;
            case 6:
                $this->setIdProducto($value);
                break;
            case 7:
                $this->setPrecio($value);
                break;
            case 8:
                $this->setObservaciones($value);
                break;
            case 9:
                $this->setACuenta($value);
                break;
            case 10:
                $this->setSaldo($value);
                break;
            case 11:
                $this->setEntregado($value);
                break;
            case 12:
                $this->setPagado($value);
                break;
            case 13:
                $this->setEstado($value);
                break;
            case 14:
                $this->setChangeCount($value);
                break;
            case 15:
                $this->setIdUserModified($value);
                break;
            case 16:
                $this->setIdUserCreated($value);
                break;
            case 17:
                $this->setDateModified($value);
                break;
            case 18:
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
        $keys = HbfVentasTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdVenta($arr[$keys[0]]);
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
            $this->setFechaVenta($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIdProducto($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPrecio($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setObservaciones($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setACuenta($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSaldo($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setEntregado($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPagado($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setEstado($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setChangeCount($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setIdUserModified($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIdUserCreated($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setDateModified($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDateCreated($arr[$keys[18]]);
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
     * @return $this|\HbfVentas The current object, for fluid interface
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
        $criteria = new Criteria(HbfVentasTableMap::DATABASE_NAME);

        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_VENTA)) {
            $criteria->add(HbfVentasTableMap::COL_ID_VENTA, $this->id_venta);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_CLUB)) {
            $criteria->add(HbfVentasTableMap::COL_ID_CLUB, $this->id_club);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_TURNO)) {
            $criteria->add(HbfVentasTableMap::COL_ID_TURNO, $this->id_turno);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_SESION)) {
            $criteria->add(HbfVentasTableMap::COL_ID_SESION, $this->id_sesion);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_CLIENTE)) {
            $criteria->add(HbfVentasTableMap::COL_ID_CLIENTE, $this->id_cliente);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_FECHA_VENTA)) {
            $criteria->add(HbfVentasTableMap::COL_FECHA_VENTA, $this->fecha_venta);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_PRODUCTO)) {
            $criteria->add(HbfVentasTableMap::COL_ID_PRODUCTO, $this->id_producto);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_PRECIO)) {
            $criteria->add(HbfVentasTableMap::COL_PRECIO, $this->precio);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_OBSERVACIONES)) {
            $criteria->add(HbfVentasTableMap::COL_OBSERVACIONES, $this->observaciones);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_A_CUENTA)) {
            $criteria->add(HbfVentasTableMap::COL_A_CUENTA, $this->a_cuenta);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_SALDO)) {
            $criteria->add(HbfVentasTableMap::COL_SALDO, $this->saldo);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ENTREGADO)) {
            $criteria->add(HbfVentasTableMap::COL_ENTREGADO, $this->entregado);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_PAGADO)) {
            $criteria->add(HbfVentasTableMap::COL_PAGADO, $this->pagado);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ESTADO)) {
            $criteria->add(HbfVentasTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(HbfVentasTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(HbfVentasTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(HbfVentasTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(HbfVentasTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(HbfVentasTableMap::COL_DATE_CREATED)) {
            $criteria->add(HbfVentasTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildHbfVentasQuery::create();
        $criteria->add(HbfVentasTableMap::COL_ID_VENTA, $this->id_venta);

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
        $validPk = null !== $this->getIdVenta();

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
        return $this->getIdVenta();
    }

    /**
     * Generic method to set the primary key (id_venta column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdVenta($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdVenta();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HbfVentas (or compatible) type.
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
        $copyObj->setFechaVenta($this->getFechaVenta());
        $copyObj->setIdProducto($this->getIdProducto());
        $copyObj->setPrecio($this->getPrecio());
        $copyObj->setObservaciones($this->getObservaciones());
        $copyObj->setACuenta($this->getACuenta());
        $copyObj->setSaldo($this->getSaldo());
        $copyObj->setEntregado($this->getEntregado());
        $copyObj->setPagado($this->getPagado());
        $copyObj->setEstado($this->getEstado());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdVenta(NULL); // this is a auto-increment column, so set to default value
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
     * @return \HbfVentas Clone of current object.
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
     * @return $this|\HbfVentas The current object (for fluent API support)
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
            $v->addHbfVentasRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addHbfVentassRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfVentas The current object (for fluent API support)
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
            $v->addHbfVentasRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addHbfVentassRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfVentas The current object (for fluent API support)
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
            $v->addHbfVentasRelatedByIdCliente($this);
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
                $this->aCiUsuariosRelatedByIdCliente->addHbfVentassRelatedByIdCliente($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdCliente;
    }

    /**
     * Declares an association between this object and a ChildHbfClubs object.
     *
     * @param  ChildHbfClubs $v
     * @return $this|\HbfVentas The current object (for fluent API support)
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
            $v->addHbfVentas($this);
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
                $this->aHbfClubs->addHbfVentass($this);
             */
        }

        return $this->aHbfClubs;
    }

    /**
     * Declares an association between this object and a ChildHbfTurnos object.
     *
     * @param  ChildHbfTurnos $v
     * @return $this|\HbfVentas The current object (for fluent API support)
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
            $v->addHbfVentas($this);
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
                $this->aHbfTurnos->addHbfVentass($this);
             */
        }

        return $this->aHbfTurnos;
    }

    /**
     * Declares an association between this object and a ChildHbfSesiones object.
     *
     * @param  ChildHbfSesiones $v
     * @return $this|\HbfVentas The current object (for fluent API support)
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
            $v->addHbfVentas($this);
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
                $this->aHbfSesiones->addHbfVentass($this);
             */
        }

        return $this->aHbfSesiones;
    }

    /**
     * Declares an association between this object and a ChildHbfProductos object.
     *
     * @param  ChildHbfProductos $v
     * @return $this|\HbfVentas The current object (for fluent API support)
     * @throws PropelException
     */
    public function setHbfProductos(ChildHbfProductos $v = null)
    {
        if ($v === null) {
            $this->setIdProducto(NULL);
        } else {
            $this->setIdProducto($v->getIdProducto());
        }

        $this->aHbfProductos = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildHbfProductos object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfVentas($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildHbfProductos object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildHbfProductos The associated ChildHbfProductos object.
     * @throws PropelException
     */
    public function getHbfProductos(ConnectionInterface $con = null)
    {
        if ($this->aHbfProductos === null && ($this->id_producto != 0)) {
            $this->aHbfProductos = ChildHbfProductosQuery::create()->findPk($this->id_producto, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aHbfProductos->addHbfVentass($this);
             */
        }

        return $this->aHbfProductos;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {
            $this->aCiUsuariosRelatedByIdUserCreated->removeHbfVentasRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeHbfVentasRelatedByIdUserModified($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdCliente) {
            $this->aCiUsuariosRelatedByIdCliente->removeHbfVentasRelatedByIdCliente($this);
        }
        if (null !== $this->aHbfClubs) {
            $this->aHbfClubs->removeHbfVentas($this);
        }
        if (null !== $this->aHbfTurnos) {
            $this->aHbfTurnos->removeHbfVentas($this);
        }
        if (null !== $this->aHbfSesiones) {
            $this->aHbfSesiones->removeHbfVentas($this);
        }
        if (null !== $this->aHbfProductos) {
            $this->aHbfProductos->removeHbfVentas($this);
        }
        $this->id_venta = null;
        $this->id_club = null;
        $this->id_turno = null;
        $this->id_sesion = null;
        $this->id_cliente = null;
        $this->fecha_venta = null;
        $this->id_producto = null;
        $this->precio = null;
        $this->observaciones = null;
        $this->a_cuenta = null;
        $this->saldo = null;
        $this->entregado = null;
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
        } // if ($deep)

        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
        $this->aCiUsuariosRelatedByIdCliente = null;
        $this->aHbfClubs = null;
        $this->aHbfTurnos = null;
        $this->aHbfSesiones = null;
        $this->aHbfProductos = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(HbfVentasTableMap::DEFAULT_STRING_FORMAT);
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
