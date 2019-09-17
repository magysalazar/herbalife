<?php

namespace Base;

use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \HbfDetallesPedidos as ChildHbfDetallesPedidos;
use \HbfDetallesPedidosQuery as ChildHbfDetallesPedidosQuery;
use \HbfIngresos as ChildHbfIngresos;
use \HbfIngresosQuery as ChildHbfIngresosQuery;
use \HbfPorciones as ChildHbfPorciones;
use \HbfPorcionesQuery as ChildHbfPorcionesQuery;
use \HbfProductos as ChildHbfProductos;
use \HbfProductosQuery as ChildHbfProductosQuery;
use \HbfVentas as ChildHbfVentas;
use \HbfVentasQuery as ChildHbfVentasQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\HbfDetallesPedidosTableMap;
use Map\HbfIngresosTableMap;
use Map\HbfPorcionesTableMap;
use Map\HbfProductosTableMap;
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
 * Base class that represents a row from the 'hbf_productos' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class HbfProductos implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\HbfProductosTableMap';


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
     * The value for the id_producto field.
     *
     * @var        int
     */
    protected $id_producto;

    /**
     * The value for the nombre field.
     *
     * @var        string
     */
    protected $nombre;

    /**
     * The value for the descripcion field.
     *
     * @var        string
     */
    protected $descripcion;

    /**
     * The value for the id_option_tipo_producto field.
     *
     * @var        int
     */
    protected $id_option_tipo_producto;

    /**
     * The value for the id_option_categoria_producto field.
     *
     * @var        int
     */
    protected $id_option_categoria_producto;

    /**
     * The value for the foto_producto field.
     *
     * @var        string
     */
    protected $foto_producto;

    /**
     * The value for the precio_venta field.
     *
     * @var        string
     */
    protected $precio_venta;

    /**
     * The value for the precio_porcion field.
     *
     * @var        string
     */
    protected $precio_porcion;

    /**
     * The value for the precio_compra field.
     *
     * @var        string
     */
    protected $precio_compra;

    /**
     * The value for the num_porciones field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $num_porciones;

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
     * @var        ChildCiOptions
     */
    protected $aCiOptionsRelatedByIdOptionCategoriaProducto;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptionsRelatedByIdOptionTipoProducto;

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
     * @var        ObjectCollection|ChildHbfPorciones[] Collection to store aggregation of ChildHbfPorciones objects.
     */
    protected $collHbfPorcioness;
    protected $collHbfPorcionessPartial;

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
     * @var ObjectCollection|ChildHbfPorciones[]
     */
    protected $hbfPorcionessScheduledForDeletion = null;

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
        $this->num_porciones = 0;
        $this->estado = 'ENABLED';
        $this->change_count = 0;
    }

    /**
     * Initializes internal state of Base\HbfProductos object.
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
     * Compares this with another <code>HbfProductos</code> instance.  If
     * <code>obj</code> is an instance of <code>HbfProductos</code>, delegates to
     * <code>equals(HbfProductos)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|HbfProductos The current object, for fluid interface
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
     * Get the [id_producto] column value.
     *
     * @return int
     */
    public function getIdProducto()
    {
        return $this->id_producto;
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
     * Get the [descripcion] column value.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the [id_option_tipo_producto] column value.
     *
     * @return int
     */
    public function getIdOptionTipoProducto()
    {
        return $this->id_option_tipo_producto;
    }

    /**
     * Get the [id_option_categoria_producto] column value.
     *
     * @return int
     */
    public function getIdOptionCategoriaProducto()
    {
        return $this->id_option_categoria_producto;
    }

    /**
     * Get the [foto_producto] column value.
     *
     * @return string
     */
    public function getFotoProducto()
    {
        return $this->foto_producto;
    }

    /**
     * Get the [precio_venta] column value.
     *
     * @return string
     */
    public function getPrecioVenta()
    {
        return $this->precio_venta;
    }

    /**
     * Get the [precio_porcion] column value.
     *
     * @return string
     */
    public function getPrecioPorcion()
    {
        return $this->precio_porcion;
    }

    /**
     * Get the [precio_compra] column value.
     *
     * @return string
     */
    public function getPrecioCompra()
    {
        return $this->precio_compra;
    }

    /**
     * Get the [num_porciones] column value.
     *
     * @return int
     */
    public function getNumPorciones()
    {
        return $this->num_porciones;
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
     * Set the value of [id_producto] column.
     *
     * @param int $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setIdProducto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_producto !== $v) {
            $this->id_producto = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_ID_PRODUCTO] = true;
        }

        return $this;
    } // setIdProducto()

    /**
     * Set the value of [nombre] column.
     *
     * @param string $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_NOMBRE] = true;
        }

        return $this;
    } // setNombre()

    /**
     * Set the value of [descripcion] column.
     *
     * @param string $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_DESCRIPCION] = true;
        }

        return $this;
    } // setDescripcion()

    /**
     * Set the value of [id_option_tipo_producto] column.
     *
     * @param int $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setIdOptionTipoProducto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_option_tipo_producto !== $v) {
            $this->id_option_tipo_producto = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO] = true;
        }

        if ($this->aCiOptionsRelatedByIdOptionTipoProducto !== null && $this->aCiOptionsRelatedByIdOptionTipoProducto->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdOptionTipoProducto = null;
        }

        return $this;
    } // setIdOptionTipoProducto()

    /**
     * Set the value of [id_option_categoria_producto] column.
     *
     * @param int $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setIdOptionCategoriaProducto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_option_categoria_producto !== $v) {
            $this->id_option_categoria_producto = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO] = true;
        }

        if ($this->aCiOptionsRelatedByIdOptionCategoriaProducto !== null && $this->aCiOptionsRelatedByIdOptionCategoriaProducto->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdOptionCategoriaProducto = null;
        }

        return $this;
    } // setIdOptionCategoriaProducto()

    /**
     * Set the value of [foto_producto] column.
     *
     * @param string $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setFotoProducto($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->foto_producto !== $v) {
            $this->foto_producto = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_FOTO_PRODUCTO] = true;
        }

        return $this;
    } // setFotoProducto()

    /**
     * Set the value of [precio_venta] column.
     *
     * @param string $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setPrecioVenta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->precio_venta !== $v) {
            $this->precio_venta = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_PRECIO_VENTA] = true;
        }

        return $this;
    } // setPrecioVenta()

    /**
     * Set the value of [precio_porcion] column.
     *
     * @param string $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setPrecioPorcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->precio_porcion !== $v) {
            $this->precio_porcion = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_PRECIO_PORCION] = true;
        }

        return $this;
    } // setPrecioPorcion()

    /**
     * Set the value of [precio_compra] column.
     *
     * @param string $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setPrecioCompra($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->precio_compra !== $v) {
            $this->precio_compra = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_PRECIO_COMPRA] = true;
        }

        return $this;
    } // setPrecioCompra()

    /**
     * Set the value of [num_porciones] column.
     *
     * @param int $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setNumPorciones($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->num_porciones !== $v) {
            $this->num_porciones = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_NUM_PORCIONES] = true;
        }

        return $this;
    } // setNumPorciones()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[HbfProductosTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfProductosTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfProductosTableMap::COL_DATE_CREATED] = true;
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
            if ($this->num_porciones !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : HbfProductosTableMap::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_producto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : HbfProductosTableMap::translateFieldName('Nombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : HbfProductosTableMap::translateFieldName('Descripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : HbfProductosTableMap::translateFieldName('IdOptionTipoProducto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_option_tipo_producto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : HbfProductosTableMap::translateFieldName('IdOptionCategoriaProducto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_option_categoria_producto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : HbfProductosTableMap::translateFieldName('FotoProducto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->foto_producto = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : HbfProductosTableMap::translateFieldName('PrecioVenta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->precio_venta = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : HbfProductosTableMap::translateFieldName('PrecioPorcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->precio_porcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : HbfProductosTableMap::translateFieldName('PrecioCompra', TableMap::TYPE_PHPNAME, $indexType)];
            $this->precio_compra = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : HbfProductosTableMap::translateFieldName('NumPorciones', TableMap::TYPE_PHPNAME, $indexType)];
            $this->num_porciones = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : HbfProductosTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : HbfProductosTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : HbfProductosTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : HbfProductosTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : HbfProductosTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : HbfProductosTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = HbfProductosTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\HbfProductos'), 0, $e);
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
        if ($this->aCiOptionsRelatedByIdOptionTipoProducto !== null && $this->id_option_tipo_producto !== $this->aCiOptionsRelatedByIdOptionTipoProducto->getIdOption()) {
            $this->aCiOptionsRelatedByIdOptionTipoProducto = null;
        }
        if ($this->aCiOptionsRelatedByIdOptionCategoriaProducto !== null && $this->id_option_categoria_producto !== $this->aCiOptionsRelatedByIdOptionCategoriaProducto->getIdOption()) {
            $this->aCiOptionsRelatedByIdOptionCategoriaProducto = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(HbfProductosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildHbfProductosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aCiOptionsRelatedByIdOptionCategoriaProducto = null;
            $this->aCiOptionsRelatedByIdOptionTipoProducto = null;
            $this->collHbfDetallesPedidoss = null;

            $this->collHbfIngresoss = null;

            $this->collHbfPorcioness = null;

            $this->collHbfVentass = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see HbfProductos::setDeleted()
     * @see HbfProductos::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfProductosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildHbfProductosQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfProductosTableMap::DATABASE_NAME);
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
                HbfProductosTableMap::addInstanceToPool($this);
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

            if ($this->aCiOptionsRelatedByIdOptionCategoriaProducto !== null) {
                if ($this->aCiOptionsRelatedByIdOptionCategoriaProducto->isModified() || $this->aCiOptionsRelatedByIdOptionCategoriaProducto->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdOptionCategoriaProducto->save($con);
                }
                $this->setCiOptionsRelatedByIdOptionCategoriaProducto($this->aCiOptionsRelatedByIdOptionCategoriaProducto);
            }

            if ($this->aCiOptionsRelatedByIdOptionTipoProducto !== null) {
                if ($this->aCiOptionsRelatedByIdOptionTipoProducto->isModified() || $this->aCiOptionsRelatedByIdOptionTipoProducto->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdOptionTipoProducto->save($con);
                }
                $this->setCiOptionsRelatedByIdOptionTipoProducto($this->aCiOptionsRelatedByIdOptionTipoProducto);
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
                    \HbfDetallesPedidosQuery::create()
                        ->filterByPrimaryKeys($this->hbfDetallesPedidossScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->hbfPorcionessScheduledForDeletion !== null) {
                if (!$this->hbfPorcionessScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfPorcionessScheduledForDeletion as $hbfPorciones) {
                        // need to save related object because we set the relation to null
                        $hbfPorciones->save($con);
                    }
                    $this->hbfPorcionessScheduledForDeletion = null;
                }
            }

            if ($this->collHbfPorcioness !== null) {
                foreach ($this->collHbfPorcioness as $referrerFK) {
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

        $this->modifiedColumns[HbfProductosTableMap::COL_ID_PRODUCTO] = true;
        if (null !== $this->id_producto) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HbfProductosTableMap::COL_ID_PRODUCTO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_PRODUCTO)) {
            $modifiedColumns[':p' . $index++]  = 'id_producto';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'nombre';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'descripcion';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO)) {
            $modifiedColumns[':p' . $index++]  = 'id_option_tipo_producto';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO)) {
            $modifiedColumns[':p' . $index++]  = 'id_option_categoria_producto';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_FOTO_PRODUCTO)) {
            $modifiedColumns[':p' . $index++]  = 'foto_producto';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_PRECIO_VENTA)) {
            $modifiedColumns[':p' . $index++]  = 'precio_venta';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_PRECIO_PORCION)) {
            $modifiedColumns[':p' . $index++]  = 'precio_porcion';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_PRECIO_COMPRA)) {
            $modifiedColumns[':p' . $index++]  = 'precio_compra';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_NUM_PORCIONES)) {
            $modifiedColumns[':p' . $index++]  = 'num_porciones';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO hbf_productos (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_producto':
                        $stmt->bindValue($identifier, $this->id_producto, PDO::PARAM_INT);
                        break;
                    case 'nombre':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case 'descripcion':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case 'id_option_tipo_producto':
                        $stmt->bindValue($identifier, $this->id_option_tipo_producto, PDO::PARAM_INT);
                        break;
                    case 'id_option_categoria_producto':
                        $stmt->bindValue($identifier, $this->id_option_categoria_producto, PDO::PARAM_INT);
                        break;
                    case 'foto_producto':
                        $stmt->bindValue($identifier, $this->foto_producto, PDO::PARAM_STR);
                        break;
                    case 'precio_venta':
                        $stmt->bindValue($identifier, $this->precio_venta, PDO::PARAM_STR);
                        break;
                    case 'precio_porcion':
                        $stmt->bindValue($identifier, $this->precio_porcion, PDO::PARAM_STR);
                        break;
                    case 'precio_compra':
                        $stmt->bindValue($identifier, $this->precio_compra, PDO::PARAM_STR);
                        break;
                    case 'num_porciones':
                        $stmt->bindValue($identifier, $this->num_porciones, PDO::PARAM_INT);
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
        $this->setIdProducto($pk);

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
        $pos = HbfProductosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdProducto();
                break;
            case 1:
                return $this->getNombre();
                break;
            case 2:
                return $this->getDescripcion();
                break;
            case 3:
                return $this->getIdOptionTipoProducto();
                break;
            case 4:
                return $this->getIdOptionCategoriaProducto();
                break;
            case 5:
                return $this->getFotoProducto();
                break;
            case 6:
                return $this->getPrecioVenta();
                break;
            case 7:
                return $this->getPrecioPorcion();
                break;
            case 8:
                return $this->getPrecioCompra();
                break;
            case 9:
                return $this->getNumPorciones();
                break;
            case 10:
                return $this->getEstado();
                break;
            case 11:
                return $this->getChangeCount();
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

        if (isset($alreadyDumpedObjects['HbfProductos'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['HbfProductos'][$this->hashCode()] = true;
        $keys = HbfProductosTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProducto(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getDescripcion(),
            $keys[3] => $this->getIdOptionTipoProducto(),
            $keys[4] => $this->getIdOptionCategoriaProducto(),
            $keys[5] => $this->getFotoProducto(),
            $keys[6] => $this->getPrecioVenta(),
            $keys[7] => $this->getPrecioPorcion(),
            $keys[8] => $this->getPrecioCompra(),
            $keys[9] => $this->getNumPorciones(),
            $keys[10] => $this->getEstado(),
            $keys[11] => $this->getChangeCount(),
            $keys[12] => $this->getIdUserModified(),
            $keys[13] => $this->getIdUserCreated(),
            $keys[14] => $this->getDateModified(),
            $keys[15] => $this->getDateCreated(),
        );
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
            if (null !== $this->aCiOptionsRelatedByIdOptionCategoriaProducto) {

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

                $result[$key] = $this->aCiOptionsRelatedByIdOptionCategoriaProducto->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiOptionsRelatedByIdOptionTipoProducto) {

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

                $result[$key] = $this->aCiOptionsRelatedByIdOptionTipoProducto->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collHbfPorcioness) {

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

                $result[$key] = $this->collHbfPorcioness->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\HbfProductos
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = HbfProductosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\HbfProductos
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProducto($value);
                break;
            case 1:
                $this->setNombre($value);
                break;
            case 2:
                $this->setDescripcion($value);
                break;
            case 3:
                $this->setIdOptionTipoProducto($value);
                break;
            case 4:
                $this->setIdOptionCategoriaProducto($value);
                break;
            case 5:
                $this->setFotoProducto($value);
                break;
            case 6:
                $this->setPrecioVenta($value);
                break;
            case 7:
                $this->setPrecioPorcion($value);
                break;
            case 8:
                $this->setPrecioCompra($value);
                break;
            case 9:
                $this->setNumPorciones($value);
                break;
            case 10:
                $this->setEstado($value);
                break;
            case 11:
                $this->setChangeCount($value);
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
        $keys = HbfProductosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdProducto($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNombre($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDescripcion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdOptionTipoProducto($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIdOptionCategoriaProducto($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFotoProducto($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPrecioVenta($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPrecioPorcion($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPrecioCompra($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNumPorciones($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setEstado($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setChangeCount($arr[$keys[11]]);
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
     * @return $this|\HbfProductos The current object, for fluid interface
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
        $criteria = new Criteria(HbfProductosTableMap::DATABASE_NAME);

        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_PRODUCTO)) {
            $criteria->add(HbfProductosTableMap::COL_ID_PRODUCTO, $this->id_producto);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_NOMBRE)) {
            $criteria->add(HbfProductosTableMap::COL_NOMBRE, $this->nombre);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_DESCRIPCION)) {
            $criteria->add(HbfProductosTableMap::COL_DESCRIPCION, $this->descripcion);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO)) {
            $criteria->add(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO, $this->id_option_tipo_producto);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO)) {
            $criteria->add(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO, $this->id_option_categoria_producto);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_FOTO_PRODUCTO)) {
            $criteria->add(HbfProductosTableMap::COL_FOTO_PRODUCTO, $this->foto_producto);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_PRECIO_VENTA)) {
            $criteria->add(HbfProductosTableMap::COL_PRECIO_VENTA, $this->precio_venta);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_PRECIO_PORCION)) {
            $criteria->add(HbfProductosTableMap::COL_PRECIO_PORCION, $this->precio_porcion);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_PRECIO_COMPRA)) {
            $criteria->add(HbfProductosTableMap::COL_PRECIO_COMPRA, $this->precio_compra);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_NUM_PORCIONES)) {
            $criteria->add(HbfProductosTableMap::COL_NUM_PORCIONES, $this->num_porciones);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ESTADO)) {
            $criteria->add(HbfProductosTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(HbfProductosTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(HbfProductosTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(HbfProductosTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(HbfProductosTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(HbfProductosTableMap::COL_DATE_CREATED)) {
            $criteria->add(HbfProductosTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildHbfProductosQuery::create();
        $criteria->add(HbfProductosTableMap::COL_ID_PRODUCTO, $this->id_producto);

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
        $validPk = null !== $this->getIdProducto();

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
        return $this->getIdProducto();
    }

    /**
     * Generic method to set the primary key (id_producto column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProducto($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdProducto();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HbfProductos (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setIdOptionTipoProducto($this->getIdOptionTipoProducto());
        $copyObj->setIdOptionCategoriaProducto($this->getIdOptionCategoriaProducto());
        $copyObj->setFotoProducto($this->getFotoProducto());
        $copyObj->setPrecioVenta($this->getPrecioVenta());
        $copyObj->setPrecioPorcion($this->getPrecioPorcion());
        $copyObj->setPrecioCompra($this->getPrecioCompra());
        $copyObj->setNumPorciones($this->getNumPorciones());
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

            foreach ($this->getHbfPorcioness() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPorciones($relObj->copy($deepCopy));
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
            $copyObj->setIdProducto(NULL); // this is a auto-increment column, so set to default value
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
     * @return \HbfProductos Clone of current object.
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
     * @return $this|\HbfProductos The current object (for fluent API support)
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
            $v->addHbfProductosRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addHbfProductossRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfProductos The current object (for fluent API support)
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
            $v->addHbfProductosRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addHbfProductossRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\HbfProductos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdOptionCategoriaProducto(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOptionCategoriaProducto(NULL);
        } else {
            $this->setIdOptionCategoriaProducto($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdOptionCategoriaProducto = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfProductosRelatedByIdOptionCategoriaProducto($this);
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
    public function getCiOptionsRelatedByIdOptionCategoriaProducto(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdOptionCategoriaProducto === null && ($this->id_option_categoria_producto != 0)) {
            $this->aCiOptionsRelatedByIdOptionCategoriaProducto = ChildCiOptionsQuery::create()->findPk($this->id_option_categoria_producto, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdOptionCategoriaProducto->addHbfProductossRelatedByIdOptionCategoriaProducto($this);
             */
        }

        return $this->aCiOptionsRelatedByIdOptionCategoriaProducto;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\HbfProductos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdOptionTipoProducto(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOptionTipoProducto(NULL);
        } else {
            $this->setIdOptionTipoProducto($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdOptionTipoProducto = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfProductosRelatedByIdOptionTipoProducto($this);
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
    public function getCiOptionsRelatedByIdOptionTipoProducto(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdOptionTipoProducto === null && ($this->id_option_tipo_producto != 0)) {
            $this->aCiOptionsRelatedByIdOptionTipoProducto = ChildCiOptionsQuery::create()->findPk($this->id_option_tipo_producto, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdOptionTipoProducto->addHbfProductossRelatedByIdOptionTipoProducto($this);
             */
        }

        return $this->aCiOptionsRelatedByIdOptionTipoProducto;
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
        if ('HbfPorciones' == $relationName) {
            $this->initHbfPorcioness();
            return;
        }
        if ('HbfVentas' == $relationName) {
            $this->initHbfVentass();
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
     * If this ChildHbfProductos is new, it will return
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
                    ->filterByHbfProductos($this)
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
     * @return $this|ChildHbfProductos The current object (for fluent API support)
     */
    public function setHbfDetallesPedidoss(Collection $hbfDetallesPedidoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfDetallesPedidos[] $hbfDetallesPedidossToDelete */
        $hbfDetallesPedidossToDelete = $this->getHbfDetallesPedidoss(new Criteria(), $con)->diff($hbfDetallesPedidoss);


        $this->hbfDetallesPedidossScheduledForDeletion = $hbfDetallesPedidossToDelete;

        foreach ($hbfDetallesPedidossToDelete as $hbfDetallesPedidosRemoved) {
            $hbfDetallesPedidosRemoved->setHbfProductos(null);
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
                ->filterByHbfProductos($this)
                ->count($con);
        }

        return count($this->collHbfDetallesPedidoss);
    }

    /**
     * Method called to associate a ChildHbfDetallesPedidos object to this object
     * through the ChildHbfDetallesPedidos foreign key attribute.
     *
     * @param  ChildHbfDetallesPedidos $l ChildHbfDetallesPedidos
     * @return $this|\HbfProductos The current object (for fluent API support)
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
        $hbfDetallesPedidos->setHbfProductos($this);
    }

    /**
     * @param  ChildHbfDetallesPedidos $hbfDetallesPedidos The ChildHbfDetallesPedidos object to remove.
     * @return $this|ChildHbfProductos The current object (for fluent API support)
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
            $this->hbfDetallesPedidossScheduledForDeletion[]= clone $hbfDetallesPedidos;
            $hbfDetallesPedidos->setHbfProductos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfDetallesPedidoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfDetallesPedidos[] List of ChildHbfDetallesPedidos objects
     */
    public function getHbfDetallesPedidossJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfDetallesPedidosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

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
     * If this ChildHbfProductos is new, it will return
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
                    ->filterByHbfProductos($this)
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
     * @return $this|ChildHbfProductos The current object (for fluent API support)
     */
    public function setHbfIngresoss(Collection $hbfIngresoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfIngresos[] $hbfIngresossToDelete */
        $hbfIngresossToDelete = $this->getHbfIngresoss(new Criteria(), $con)->diff($hbfIngresoss);


        $this->hbfIngresossScheduledForDeletion = $hbfIngresossToDelete;

        foreach ($hbfIngresossToDelete as $hbfIngresosRemoved) {
            $hbfIngresosRemoved->setHbfProductos(null);
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
                ->filterByHbfProductos($this)
                ->count($con);
        }

        return count($this->collHbfIngresoss);
    }

    /**
     * Method called to associate a ChildHbfIngresos object to this object
     * through the ChildHbfIngresos foreign key attribute.
     *
     * @param  ChildHbfIngresos $l ChildHbfIngresos
     * @return $this|\HbfProductos The current object (for fluent API support)
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
        $hbfIngresos->setHbfProductos($this);
    }

    /**
     * @param  ChildHbfIngresos $hbfIngresos The ChildHbfIngresos object to remove.
     * @return $this|ChildHbfProductos The current object (for fluent API support)
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
            $hbfIngresos->setHbfProductos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfIngresos[] List of ChildHbfIngresos objects
     */
    public function getHbfIngresossJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfIngresosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfIngresoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Clears out the collHbfPorcioness collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfPorcioness()
     */
    public function clearHbfPorcioness()
    {
        $this->collHbfPorcioness = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfPorcioness collection loaded partially.
     */
    public function resetPartialHbfPorcioness($v = true)
    {
        $this->collHbfPorcionessPartial = $v;
    }

    /**
     * Initializes the collHbfPorcioness collection.
     *
     * By default this just sets the collHbfPorcioness collection to an empty array (like clearcollHbfPorcioness());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfPorcioness($overrideExisting = true)
    {
        if (null !== $this->collHbfPorcioness && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfPorcionesTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfPorcioness = new $collectionClassName;
        $this->collHbfPorcioness->setModel('\HbfPorciones');
    }

    /**
     * Gets an array of ChildHbfPorciones objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfProductos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfPorciones[] List of ChildHbfPorciones objects
     * @throws PropelException
     */
    public function getHbfPorcioness(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPorcionessPartial && !$this->isNew();
        if (null === $this->collHbfPorcioness || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfPorcioness) {
                // return empty collection
                $this->initHbfPorcioness();
            } else {
                $collHbfPorcioness = ChildHbfPorcionesQuery::create(null, $criteria)
                    ->filterByHbfProductos($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfPorcionessPartial && count($collHbfPorcioness)) {
                        $this->initHbfPorcioness(false);

                        foreach ($collHbfPorcioness as $obj) {
                            if (false == $this->collHbfPorcioness->contains($obj)) {
                                $this->collHbfPorcioness->append($obj);
                            }
                        }

                        $this->collHbfPorcionessPartial = true;
                    }

                    return $collHbfPorcioness;
                }

                if ($partial && $this->collHbfPorcioness) {
                    foreach ($this->collHbfPorcioness as $obj) {
                        if ($obj->isNew()) {
                            $collHbfPorcioness[] = $obj;
                        }
                    }
                }

                $this->collHbfPorcioness = $collHbfPorcioness;
                $this->collHbfPorcionessPartial = false;
            }
        }

        return $this->collHbfPorcioness;
    }

    /**
     * Sets a collection of ChildHbfPorciones objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfPorcioness A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfProductos The current object (for fluent API support)
     */
    public function setHbfPorcioness(Collection $hbfPorcioness, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPorciones[] $hbfPorcionessToDelete */
        $hbfPorcionessToDelete = $this->getHbfPorcioness(new Criteria(), $con)->diff($hbfPorcioness);


        $this->hbfPorcionessScheduledForDeletion = $hbfPorcionessToDelete;

        foreach ($hbfPorcionessToDelete as $hbfPorcionesRemoved) {
            $hbfPorcionesRemoved->setHbfProductos(null);
        }

        $this->collHbfPorcioness = null;
        foreach ($hbfPorcioness as $hbfPorciones) {
            $this->addHbfPorciones($hbfPorciones);
        }

        $this->collHbfPorcioness = $hbfPorcioness;
        $this->collHbfPorcionessPartial = false;

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
    public function countHbfPorcioness(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfPorcionessPartial && !$this->isNew();
        if (null === $this->collHbfPorcioness || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfPorcioness) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfPorcioness());
            }

            $query = ChildHbfPorcionesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfProductos($this)
                ->count($con);
        }

        return count($this->collHbfPorcioness);
    }

    /**
     * Method called to associate a ChildHbfPorciones object to this object
     * through the ChildHbfPorciones foreign key attribute.
     *
     * @param  ChildHbfPorciones $l ChildHbfPorciones
     * @return $this|\HbfProductos The current object (for fluent API support)
     */
    public function addHbfPorciones(ChildHbfPorciones $l)
    {
        if ($this->collHbfPorcioness === null) {
            $this->initHbfPorcioness();
            $this->collHbfPorcionessPartial = true;
        }

        if (!$this->collHbfPorcioness->contains($l)) {
            $this->doAddHbfPorciones($l);

            if ($this->hbfPorcionessScheduledForDeletion and $this->hbfPorcionessScheduledForDeletion->contains($l)) {
                $this->hbfPorcionessScheduledForDeletion->remove($this->hbfPorcionessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfPorciones $hbfPorciones The ChildHbfPorciones object to add.
     */
    protected function doAddHbfPorciones(ChildHbfPorciones $hbfPorciones)
    {
        $this->collHbfPorcioness[]= $hbfPorciones;
        $hbfPorciones->setHbfProductos($this);
    }

    /**
     * @param  ChildHbfPorciones $hbfPorciones The ChildHbfPorciones object to remove.
     * @return $this|ChildHbfProductos The current object (for fluent API support)
     */
    public function removeHbfPorciones(ChildHbfPorciones $hbfPorciones)
    {
        if ($this->getHbfPorcioness()->contains($hbfPorciones)) {
            $pos = $this->collHbfPorcioness->search($hbfPorciones);
            $this->collHbfPorcioness->remove($pos);
            if (null === $this->hbfPorcionessScheduledForDeletion) {
                $this->hbfPorcionessScheduledForDeletion = clone $this->collHbfPorcioness;
                $this->hbfPorcionessScheduledForDeletion->clear();
            }
            $this->hbfPorcionessScheduledForDeletion[]= $hbfPorciones;
            $hbfPorciones->setHbfProductos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfPorcioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPorciones[] List of ChildHbfPorciones objects
     */
    public function getHbfPorcionessJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPorcionesQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfPorcioness($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfPorcioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfPorciones[] List of ChildHbfPorciones objects
     */
    public function getHbfPorcionessJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfPorcionesQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfPorcioness($query, $con);
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
     * If this ChildHbfProductos is new, it will return
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
                    ->filterByHbfProductos($this)
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
     * @return $this|ChildHbfProductos The current object (for fluent API support)
     */
    public function setHbfVentass(Collection $hbfVentass, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVentas[] $hbfVentassToDelete */
        $hbfVentassToDelete = $this->getHbfVentass(new Criteria(), $con)->diff($hbfVentass);


        $this->hbfVentassScheduledForDeletion = $hbfVentassToDelete;

        foreach ($hbfVentassToDelete as $hbfVentasRemoved) {
            $hbfVentasRemoved->setHbfProductos(null);
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
                ->filterByHbfProductos($this)
                ->count($con);
        }

        return count($this->collHbfVentass);
    }

    /**
     * Method called to associate a ChildHbfVentas object to this object
     * through the ChildHbfVentas foreign key attribute.
     *
     * @param  ChildHbfVentas $l ChildHbfVentas
     * @return $this|\HbfProductos The current object (for fluent API support)
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
        $hbfVentas->setHbfProductos($this);
    }

    /**
     * @param  ChildHbfVentas $hbfVentas The ChildHbfVentas object to remove.
     * @return $this|ChildHbfProductos The current object (for fluent API support)
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
            $hbfVentas->setHbfProductos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Otherwise if this HbfProductos is new, it will return
     * an empty collection; or if this HbfProductos has previously
     * been saved, it will retrieve related HbfVentass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfProductos.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {
            $this->aCiUsuariosRelatedByIdUserCreated->removeHbfProductosRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeHbfProductosRelatedByIdUserModified($this);
        }
        if (null !== $this->aCiOptionsRelatedByIdOptionCategoriaProducto) {
            $this->aCiOptionsRelatedByIdOptionCategoriaProducto->removeHbfProductosRelatedByIdOptionCategoriaProducto($this);
        }
        if (null !== $this->aCiOptionsRelatedByIdOptionTipoProducto) {
            $this->aCiOptionsRelatedByIdOptionTipoProducto->removeHbfProductosRelatedByIdOptionTipoProducto($this);
        }
        $this->id_producto = null;
        $this->nombre = null;
        $this->descripcion = null;
        $this->id_option_tipo_producto = null;
        $this->id_option_categoria_producto = null;
        $this->foto_producto = null;
        $this->precio_venta = null;
        $this->precio_porcion = null;
        $this->precio_compra = null;
        $this->num_porciones = null;
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
            if ($this->collHbfPorcioness) {
                foreach ($this->collHbfPorcioness as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVentass) {
                foreach ($this->collHbfVentass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collHbfDetallesPedidoss = null;
        $this->collHbfIngresoss = null;
        $this->collHbfPorcioness = null;
        $this->collHbfVentass = null;
        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
        $this->aCiOptionsRelatedByIdOptionCategoriaProducto = null;
        $this->aCiOptionsRelatedByIdOptionTipoProducto = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(HbfProductosTableMap::DEFAULT_STRING_FORMAT);
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
