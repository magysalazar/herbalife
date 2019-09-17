<?php

namespace Base;

use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \HbfOpciones as ChildHbfOpciones;
use \HbfOpcionesQuery as ChildHbfOpcionesQuery;
use \HbfPrepagos as ChildHbfPrepagos;
use \HbfPrepagosQuery as ChildHbfPrepagosQuery;
use \HbfProductos as ChildHbfProductos;
use \HbfProductosQuery as ChildHbfProductosQuery;
use \HbfVasos as ChildHbfVasos;
use \HbfVasosQuery as ChildHbfVasosQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CiUsuariosTableMap;
use Map\HbfOpcionesTableMap;
use Map\HbfPrepagosTableMap;
use Map\HbfProductosTableMap;
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
 * Base class that represents a row from the 'hbf_opciones' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class HbfOpciones implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\HbfOpcionesTableMap';


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
     * The value for the id_option field.
     *
     * @var        int
     */
    protected $id_option;

    /**
     * The value for the tabla field.
     *
     * @var        string
     */
    protected $tabla;

    /**
     * The value for the tipo field.
     *
     * @var        string
     */
    protected $tipo;

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
     * The value for the precio field.
     *
     * @var        string
     */
    protected $precio;

    /**
     * The value for the num_fichas field.
     *
     * @var        int
     */
    protected $num_fichas;

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
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdOptionTipoAsociado;
    protected $collCiUsuariossRelatedByIdOptionTipoAsociadoPartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdOptionTipoRole;
    protected $collCiUsuariossRelatedByIdOptionTipoRolePartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdOptionNivelAsociado;
    protected $collCiUsuariossRelatedByIdOptionNivelAsociadoPartial;

    /**
     * @var        ObjectCollection|ChildHbfPrepagos[] Collection to store aggregation of ChildHbfPrepagos objects.
     */
    protected $collHbfPrepagoss;
    protected $collHbfPrepagossPartial;

    /**
     * @var        ObjectCollection|ChildHbfProductos[] Collection to store aggregation of ChildHbfProductos objects.
     */
    protected $collHbfProductossRelatedByIdOptionCategoriaProducto;
    protected $collHbfProductossRelatedByIdOptionCategoriaProductoPartial;

    /**
     * @var        ObjectCollection|ChildHbfProductos[] Collection to store aggregation of ChildHbfProductos objects.
     */
    protected $collHbfProductossRelatedByIdOptionTipoProducto;
    protected $collHbfProductossRelatedByIdOptionTipoProductoPartial;

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
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfPrepagos[]
     */
    protected $hbfPrepagossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfProductos[]
     */
    protected $hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfProductos[]
     */
    protected $hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion = null;

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
    }

    /**
     * Initializes internal state of Base\HbfOpciones object.
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
     * Compares this with another <code>HbfOpciones</code> instance.  If
     * <code>obj</code> is an instance of <code>HbfOpciones</code>, delegates to
     * <code>equals(HbfOpciones)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|HbfOpciones The current object, for fluid interface
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
     * Get the [id_option] column value.
     *
     * @return int
     */
    public function getIdOption()
    {
        return $this->id_option;
    }

    /**
     * Get the [tabla] column value.
     *
     * @return string
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Get the [tipo] column value.
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
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
     * Get the [precio] column value.
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the [num_fichas] column value.
     *
     * @return int
     */
    public function getNumFichas()
    {
        return $this->num_fichas;
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
     * Set the value of [id_option] column.
     *
     * @param int $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setIdOption($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_option !== $v) {
            $this->id_option = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_ID_OPTION] = true;
        }

        return $this;
    } // setIdOption()

    /**
     * Set the value of [tabla] column.
     *
     * @param string $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setTabla($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tabla !== $v) {
            $this->tabla = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_TABLA] = true;
        }

        return $this;
    } // setTabla()

    /**
     * Set the value of [tipo] column.
     *
     * @param string $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setTipo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tipo !== $v) {
            $this->tipo = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_TIPO] = true;
        }

        return $this;
    } // setTipo()

    /**
     * Set the value of [nombre] column.
     *
     * @param string $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_NOMBRE] = true;
        }

        return $this;
    } // setNombre()

    /**
     * Set the value of [descripcion] column.
     *
     * @param string $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_DESCRIPCION] = true;
        }

        return $this;
    } // setDescripcion()

    /**
     * Set the value of [precio] column.
     *
     * @param string $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setPrecio($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->precio !== $v) {
            $this->precio = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_PRECIO] = true;
        }

        return $this;
    } // setPrecio()

    /**
     * Set the value of [num_fichas] column.
     *
     * @param int $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setNumFichas($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->num_fichas !== $v) {
            $this->num_fichas = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_NUM_FICHAS] = true;
        }

        return $this;
    } // setNumFichas()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[HbfOpcionesTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfOpcionesTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfOpcionesTableMap::COL_DATE_CREATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : HbfOpcionesTableMap::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_option = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : HbfOpcionesTableMap::translateFieldName('Tabla', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tabla = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : HbfOpcionesTableMap::translateFieldName('Tipo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : HbfOpcionesTableMap::translateFieldName('Nombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : HbfOpcionesTableMap::translateFieldName('Descripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : HbfOpcionesTableMap::translateFieldName('Precio', TableMap::TYPE_PHPNAME, $indexType)];
            $this->precio = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : HbfOpcionesTableMap::translateFieldName('NumFichas', TableMap::TYPE_PHPNAME, $indexType)];
            $this->num_fichas = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : HbfOpcionesTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : HbfOpcionesTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : HbfOpcionesTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : HbfOpcionesTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : HbfOpcionesTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = HbfOpcionesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\HbfOpciones'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(HbfOpcionesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildHbfOpcionesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->collCiUsuariossRelatedByIdOptionTipoAsociado = null;

            $this->collCiUsuariossRelatedByIdOptionTipoRole = null;

            $this->collCiUsuariossRelatedByIdOptionNivelAsociado = null;

            $this->collHbfPrepagoss = null;

            $this->collHbfProductossRelatedByIdOptionCategoriaProducto = null;

            $this->collHbfProductossRelatedByIdOptionTipoProducto = null;

            $this->collHbfVasoss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see HbfOpciones::setDeleted()
     * @see HbfOpciones::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfOpcionesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildHbfOpcionesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfOpcionesTableMap::DATABASE_NAME);
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
                HbfOpcionesTableMap::addInstanceToPool($this);
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

            if ($this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion as $ciUsuariosRelatedByIdOptionTipoAsociado) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdOptionTipoAsociado->save($con);
                    }
                    $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdOptionTipoAsociado !== null) {
                foreach ($this->collCiUsuariossRelatedByIdOptionTipoAsociado as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion as $ciUsuariosRelatedByIdOptionTipoRole) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdOptionTipoRole->save($con);
                    }
                    $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdOptionTipoRole !== null) {
                foreach ($this->collCiUsuariossRelatedByIdOptionTipoRole as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion as $ciUsuariosRelatedByIdOptionNivelAsociado) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdOptionNivelAsociado->save($con);
                    }
                    $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdOptionNivelAsociado !== null) {
                foreach ($this->collCiUsuariossRelatedByIdOptionNivelAsociado as $referrerFK) {
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

            if ($this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion !== null) {
                if (!$this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion->isEmpty()) {
                    \HbfProductosQuery::create()
                        ->filterByPrimaryKeys($this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion = null;
                }
            }

            if ($this->collHbfProductossRelatedByIdOptionCategoriaProducto !== null) {
                foreach ($this->collHbfProductossRelatedByIdOptionCategoriaProducto as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion !== null) {
                if (!$this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion->isEmpty()) {
                    \HbfProductosQuery::create()
                        ->filterByPrimaryKeys($this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion = null;
                }
            }

            if ($this->collHbfProductossRelatedByIdOptionTipoProducto !== null) {
                foreach ($this->collHbfProductossRelatedByIdOptionTipoProducto as $referrerFK) {
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

        $this->modifiedColumns[HbfOpcionesTableMap::COL_ID_OPTION] = true;
        if (null !== $this->id_option) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HbfOpcionesTableMap::COL_ID_OPTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ID_OPTION)) {
            $modifiedColumns[':p' . $index++]  = 'id_option';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_TABLA)) {
            $modifiedColumns[':p' . $index++]  = 'tabla';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_TIPO)) {
            $modifiedColumns[':p' . $index++]  = 'tipo';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'nombre';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'descripcion';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_PRECIO)) {
            $modifiedColumns[':p' . $index++]  = 'precio';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_NUM_FICHAS)) {
            $modifiedColumns[':p' . $index++]  = 'num_fichas';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO hbf_opciones (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_option':
                        $stmt->bindValue($identifier, $this->id_option, PDO::PARAM_INT);
                        break;
                    case 'tabla':
                        $stmt->bindValue($identifier, $this->tabla, PDO::PARAM_STR);
                        break;
                    case 'tipo':
                        $stmt->bindValue($identifier, $this->tipo, PDO::PARAM_STR);
                        break;
                    case 'nombre':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case 'descripcion':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case 'precio':
                        $stmt->bindValue($identifier, $this->precio, PDO::PARAM_STR);
                        break;
                    case 'num_fichas':
                        $stmt->bindValue($identifier, $this->num_fichas, PDO::PARAM_INT);
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
        $this->setIdOption($pk);

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
        $pos = HbfOpcionesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdOption();
                break;
            case 1:
                return $this->getTabla();
                break;
            case 2:
                return $this->getTipo();
                break;
            case 3:
                return $this->getNombre();
                break;
            case 4:
                return $this->getDescripcion();
                break;
            case 5:
                return $this->getPrecio();
                break;
            case 6:
                return $this->getNumFichas();
                break;
            case 7:
                return $this->getEstado();
                break;
            case 8:
                return $this->getIdUserModified();
                break;
            case 9:
                return $this->getIdUserCreated();
                break;
            case 10:
                return $this->getDateModified();
                break;
            case 11:
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

        if (isset($alreadyDumpedObjects['HbfOpciones'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['HbfOpciones'][$this->hashCode()] = true;
        $keys = HbfOpcionesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdOption(),
            $keys[1] => $this->getTabla(),
            $keys[2] => $this->getTipo(),
            $keys[3] => $this->getNombre(),
            $keys[4] => $this->getDescripcion(),
            $keys[5] => $this->getPrecio(),
            $keys[6] => $this->getNumFichas(),
            $keys[7] => $this->getEstado(),
            $keys[8] => $this->getIdUserModified(),
            $keys[9] => $this->getIdUserCreated(),
            $keys[10] => $this->getDateModified(),
            $keys[11] => $this->getDateCreated(),
        );
        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        if ($result[$keys[11]] instanceof \DateTimeInterface) {
            $result[$keys[11]] = $result[$keys[11]]->format('c');
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
            if (null !== $this->collCiUsuariossRelatedByIdOptionTipoAsociado) {

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

                $result[$key] = $this->collCiUsuariossRelatedByIdOptionTipoAsociado->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiUsuariossRelatedByIdOptionTipoRole) {

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

                $result[$key] = $this->collCiUsuariossRelatedByIdOptionTipoRole->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiUsuariossRelatedByIdOptionNivelAsociado) {

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

                $result[$key] = $this->collCiUsuariossRelatedByIdOptionNivelAsociado->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collHbfProductossRelatedByIdOptionCategoriaProducto) {

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

                $result[$key] = $this->collHbfProductossRelatedByIdOptionCategoriaProducto->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHbfProductossRelatedByIdOptionTipoProducto) {

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

                $result[$key] = $this->collHbfProductossRelatedByIdOptionTipoProducto->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\HbfOpciones
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = HbfOpcionesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\HbfOpciones
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdOption($value);
                break;
            case 1:
                $this->setTabla($value);
                break;
            case 2:
                $this->setTipo($value);
                break;
            case 3:
                $this->setNombre($value);
                break;
            case 4:
                $this->setDescripcion($value);
                break;
            case 5:
                $this->setPrecio($value);
                break;
            case 6:
                $this->setNumFichas($value);
                break;
            case 7:
                $this->setEstado($value);
                break;
            case 8:
                $this->setIdUserModified($value);
                break;
            case 9:
                $this->setIdUserCreated($value);
                break;
            case 10:
                $this->setDateModified($value);
                break;
            case 11:
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
        $keys = HbfOpcionesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdOption($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTabla($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTipo($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNombre($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDescripcion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPrecio($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setNumFichas($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEstado($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIdUserModified($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setIdUserCreated($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDateModified($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setDateCreated($arr[$keys[11]]);
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
     * @return $this|\HbfOpciones The current object, for fluid interface
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
        $criteria = new Criteria(HbfOpcionesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ID_OPTION)) {
            $criteria->add(HbfOpcionesTableMap::COL_ID_OPTION, $this->id_option);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_TABLA)) {
            $criteria->add(HbfOpcionesTableMap::COL_TABLA, $this->tabla);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_TIPO)) {
            $criteria->add(HbfOpcionesTableMap::COL_TIPO, $this->tipo);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_NOMBRE)) {
            $criteria->add(HbfOpcionesTableMap::COL_NOMBRE, $this->nombre);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_DESCRIPCION)) {
            $criteria->add(HbfOpcionesTableMap::COL_DESCRIPCION, $this->descripcion);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_PRECIO)) {
            $criteria->add(HbfOpcionesTableMap::COL_PRECIO, $this->precio);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_NUM_FICHAS)) {
            $criteria->add(HbfOpcionesTableMap::COL_NUM_FICHAS, $this->num_fichas);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ESTADO)) {
            $criteria->add(HbfOpcionesTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(HbfOpcionesTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(HbfOpcionesTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(HbfOpcionesTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(HbfOpcionesTableMap::COL_DATE_CREATED)) {
            $criteria->add(HbfOpcionesTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildHbfOpcionesQuery::create();
        $criteria->add(HbfOpcionesTableMap::COL_ID_OPTION, $this->id_option);

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
        $validPk = null !== $this->getIdOption();

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
        return $this->getIdOption();
    }

    /**
     * Generic method to set the primary key (id_option column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdOption($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdOption();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HbfOpciones (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTabla($this->getTabla());
        $copyObj->setTipo($this->getTipo());
        $copyObj->setNombre($this->getNombre());
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setPrecio($this->getPrecio());
        $copyObj->setNumFichas($this->getNumFichas());
        $copyObj->setEstado($this->getEstado());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCiUsuariossRelatedByIdOptionTipoAsociado() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdOptionTipoAsociado($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdOptionTipoRole() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdOptionTipoRole($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdOptionNivelAsociado() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdOptionNivelAsociado($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfPrepagoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfPrepagos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfProductossRelatedByIdOptionCategoriaProducto() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfProductosRelatedByIdOptionCategoriaProducto($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfProductossRelatedByIdOptionTipoProducto() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfProductosRelatedByIdOptionTipoProducto($relObj->copy($deepCopy));
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
            $copyObj->setIdOption(NULL); // this is a auto-increment column, so set to default value
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
     * @return \HbfOpciones Clone of current object.
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
     * @return $this|\HbfOpciones The current object (for fluent API support)
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
            $v->addHbfOpcionesRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addHbfOpcionessRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfOpciones The current object (for fluent API support)
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
            $v->addHbfOpcionesRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addHbfOpcionessRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
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
        if ('CiUsuariosRelatedByIdOptionTipoAsociado' == $relationName) {
            $this->initCiUsuariossRelatedByIdOptionTipoAsociado();
            return;
        }
        if ('CiUsuariosRelatedByIdOptionTipoRole' == $relationName) {
            $this->initCiUsuariossRelatedByIdOptionTipoRole();
            return;
        }
        if ('CiUsuariosRelatedByIdOptionNivelAsociado' == $relationName) {
            $this->initCiUsuariossRelatedByIdOptionNivelAsociado();
            return;
        }
        if ('HbfPrepagos' == $relationName) {
            $this->initHbfPrepagoss();
            return;
        }
        if ('HbfProductosRelatedByIdOptionCategoriaProducto' == $relationName) {
            $this->initHbfProductossRelatedByIdOptionCategoriaProducto();
            return;
        }
        if ('HbfProductosRelatedByIdOptionTipoProducto' == $relationName) {
            $this->initHbfProductossRelatedByIdOptionTipoProducto();
            return;
        }
        if ('HbfVasos' == $relationName) {
            $this->initHbfVasoss();
            return;
        }
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdOptionTipoAsociado collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdOptionTipoAsociado()
     */
    public function clearCiUsuariossRelatedByIdOptionTipoAsociado()
    {
        $this->collCiUsuariossRelatedByIdOptionTipoAsociado = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdOptionTipoAsociado collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdOptionTipoAsociado($v = true)
    {
        $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdOptionTipoAsociado collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdOptionTipoAsociado collection to an empty array (like clearcollCiUsuariossRelatedByIdOptionTipoAsociado());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdOptionTipoAsociado($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdOptionTipoAsociado && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdOptionTipoAsociado = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdOptionTipoAsociado->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfOpciones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdOptionTipoAsociado(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOptionTipoAsociado || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOptionTipoAsociado) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdOptionTipoAsociado();
            } else {
                $collCiUsuariossRelatedByIdOptionTipoAsociado = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByHbfOpcionesRelatedByIdOptionTipoAsociado($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial && count($collCiUsuariossRelatedByIdOptionTipoAsociado)) {
                        $this->initCiUsuariossRelatedByIdOptionTipoAsociado(false);

                        foreach ($collCiUsuariossRelatedByIdOptionTipoAsociado as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdOptionTipoAsociado->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdOptionTipoAsociado->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial = true;
                    }

                    return $collCiUsuariossRelatedByIdOptionTipoAsociado;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdOptionTipoAsociado) {
                    foreach ($this->collCiUsuariossRelatedByIdOptionTipoAsociado as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdOptionTipoAsociado[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdOptionTipoAsociado = $collCiUsuariossRelatedByIdOptionTipoAsociado;
                $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdOptionTipoAsociado;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdOptionTipoAsociado A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdOptionTipoAsociado(Collection $ciUsuariossRelatedByIdOptionTipoAsociado, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdOptionTipoAsociadoToDelete */
        $ciUsuariossRelatedByIdOptionTipoAsociadoToDelete = $this->getCiUsuariossRelatedByIdOptionTipoAsociado(new Criteria(), $con)->diff($ciUsuariossRelatedByIdOptionTipoAsociado);


        $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion = $ciUsuariossRelatedByIdOptionTipoAsociadoToDelete;

        foreach ($ciUsuariossRelatedByIdOptionTipoAsociadoToDelete as $ciUsuariosRelatedByIdOptionTipoAsociadoRemoved) {
            $ciUsuariosRelatedByIdOptionTipoAsociadoRemoved->setHbfOpcionesRelatedByIdOptionTipoAsociado(null);
        }

        $this->collCiUsuariossRelatedByIdOptionTipoAsociado = null;
        foreach ($ciUsuariossRelatedByIdOptionTipoAsociado as $ciUsuariosRelatedByIdOptionTipoAsociado) {
            $this->addCiUsuariosRelatedByIdOptionTipoAsociado($ciUsuariosRelatedByIdOptionTipoAsociado);
        }

        $this->collCiUsuariossRelatedByIdOptionTipoAsociado = $ciUsuariossRelatedByIdOptionTipoAsociado;
        $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial = false;

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
    public function countCiUsuariossRelatedByIdOptionTipoAsociado(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOptionTipoAsociado || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOptionTipoAsociado) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdOptionTipoAsociado());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfOpcionesRelatedByIdOptionTipoAsociado($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdOptionTipoAsociado);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdOptionTipoAsociado(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdOptionTipoAsociado === null) {
            $this->initCiUsuariossRelatedByIdOptionTipoAsociado();
            $this->collCiUsuariossRelatedByIdOptionTipoAsociadoPartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdOptionTipoAsociado->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdOptionTipoAsociado($l);

            if ($this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion and $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion->remove($this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoAsociado The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdOptionTipoAsociado(ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoAsociado)
    {
        $this->collCiUsuariossRelatedByIdOptionTipoAsociado[]= $ciUsuariosRelatedByIdOptionTipoAsociado;
        $ciUsuariosRelatedByIdOptionTipoAsociado->setHbfOpcionesRelatedByIdOptionTipoAsociado($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoAsociado The ChildCiUsuarios object to remove.
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdOptionTipoAsociado(ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoAsociado)
    {
        if ($this->getCiUsuariossRelatedByIdOptionTipoAsociado()->contains($ciUsuariosRelatedByIdOptionTipoAsociado)) {
            $pos = $this->collCiUsuariossRelatedByIdOptionTipoAsociado->search($ciUsuariosRelatedByIdOptionTipoAsociado);
            $this->collCiUsuariossRelatedByIdOptionTipoAsociado->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdOptionTipoAsociado;
                $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion[]= $ciUsuariosRelatedByIdOptionTipoAsociado;
            $ciUsuariosRelatedByIdOptionTipoAsociado->setHbfOpcionesRelatedByIdOptionTipoAsociado(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionTipoAsociadoJoinCiUsuariosRelatedByInvitadoPor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByInvitadoPor', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionTipoAsociado($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionTipoAsociadoJoinHbfTurnosRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnosRelatedByIdTurno', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionTipoAsociado($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionTipoAsociadoJoinHbfSesionesRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfSesionesRelatedByIdSesion', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionTipoAsociado($query, $con);
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdOptionTipoRole collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdOptionTipoRole()
     */
    public function clearCiUsuariossRelatedByIdOptionTipoRole()
    {
        $this->collCiUsuariossRelatedByIdOptionTipoRole = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdOptionTipoRole collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdOptionTipoRole($v = true)
    {
        $this->collCiUsuariossRelatedByIdOptionTipoRolePartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdOptionTipoRole collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdOptionTipoRole collection to an empty array (like clearcollCiUsuariossRelatedByIdOptionTipoRole());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdOptionTipoRole($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdOptionTipoRole && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdOptionTipoRole = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdOptionTipoRole->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfOpciones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdOptionTipoRole(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOptionTipoRolePartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOptionTipoRole || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOptionTipoRole) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdOptionTipoRole();
            } else {
                $collCiUsuariossRelatedByIdOptionTipoRole = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByHbfOpcionesRelatedByIdOptionTipoRole($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdOptionTipoRolePartial && count($collCiUsuariossRelatedByIdOptionTipoRole)) {
                        $this->initCiUsuariossRelatedByIdOptionTipoRole(false);

                        foreach ($collCiUsuariossRelatedByIdOptionTipoRole as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdOptionTipoRole->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdOptionTipoRole->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdOptionTipoRolePartial = true;
                    }

                    return $collCiUsuariossRelatedByIdOptionTipoRole;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdOptionTipoRole) {
                    foreach ($this->collCiUsuariossRelatedByIdOptionTipoRole as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdOptionTipoRole[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdOptionTipoRole = $collCiUsuariossRelatedByIdOptionTipoRole;
                $this->collCiUsuariossRelatedByIdOptionTipoRolePartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdOptionTipoRole;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdOptionTipoRole A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdOptionTipoRole(Collection $ciUsuariossRelatedByIdOptionTipoRole, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdOptionTipoRoleToDelete */
        $ciUsuariossRelatedByIdOptionTipoRoleToDelete = $this->getCiUsuariossRelatedByIdOptionTipoRole(new Criteria(), $con)->diff($ciUsuariossRelatedByIdOptionTipoRole);


        $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion = $ciUsuariossRelatedByIdOptionTipoRoleToDelete;

        foreach ($ciUsuariossRelatedByIdOptionTipoRoleToDelete as $ciUsuariosRelatedByIdOptionTipoRoleRemoved) {
            $ciUsuariosRelatedByIdOptionTipoRoleRemoved->setHbfOpcionesRelatedByIdOptionTipoRole(null);
        }

        $this->collCiUsuariossRelatedByIdOptionTipoRole = null;
        foreach ($ciUsuariossRelatedByIdOptionTipoRole as $ciUsuariosRelatedByIdOptionTipoRole) {
            $this->addCiUsuariosRelatedByIdOptionTipoRole($ciUsuariosRelatedByIdOptionTipoRole);
        }

        $this->collCiUsuariossRelatedByIdOptionTipoRole = $ciUsuariossRelatedByIdOptionTipoRole;
        $this->collCiUsuariossRelatedByIdOptionTipoRolePartial = false;

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
    public function countCiUsuariossRelatedByIdOptionTipoRole(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOptionTipoRolePartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOptionTipoRole || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOptionTipoRole) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdOptionTipoRole());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfOpcionesRelatedByIdOptionTipoRole($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdOptionTipoRole);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdOptionTipoRole(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdOptionTipoRole === null) {
            $this->initCiUsuariossRelatedByIdOptionTipoRole();
            $this->collCiUsuariossRelatedByIdOptionTipoRolePartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdOptionTipoRole->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdOptionTipoRole($l);

            if ($this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion and $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion->remove($this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoRole The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdOptionTipoRole(ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoRole)
    {
        $this->collCiUsuariossRelatedByIdOptionTipoRole[]= $ciUsuariosRelatedByIdOptionTipoRole;
        $ciUsuariosRelatedByIdOptionTipoRole->setHbfOpcionesRelatedByIdOptionTipoRole($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoRole The ChildCiUsuarios object to remove.
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdOptionTipoRole(ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoRole)
    {
        if ($this->getCiUsuariossRelatedByIdOptionTipoRole()->contains($ciUsuariosRelatedByIdOptionTipoRole)) {
            $pos = $this->collCiUsuariossRelatedByIdOptionTipoRole->search($ciUsuariosRelatedByIdOptionTipoRole);
            $this->collCiUsuariossRelatedByIdOptionTipoRole->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdOptionTipoRole;
                $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdOptionTipoRoleScheduledForDeletion[]= $ciUsuariosRelatedByIdOptionTipoRole;
            $ciUsuariosRelatedByIdOptionTipoRole->setHbfOpcionesRelatedByIdOptionTipoRole(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionTipoRoleJoinCiUsuariosRelatedByInvitadoPor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByInvitadoPor', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionTipoRole($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionTipoRoleJoinHbfTurnosRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnosRelatedByIdTurno', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionTipoRole($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionTipoRoleJoinHbfSesionesRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfSesionesRelatedByIdSesion', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionTipoRole($query, $con);
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdOptionNivelAsociado collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdOptionNivelAsociado()
     */
    public function clearCiUsuariossRelatedByIdOptionNivelAsociado()
    {
        $this->collCiUsuariossRelatedByIdOptionNivelAsociado = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdOptionNivelAsociado collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdOptionNivelAsociado($v = true)
    {
        $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdOptionNivelAsociado collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdOptionNivelAsociado collection to an empty array (like clearcollCiUsuariossRelatedByIdOptionNivelAsociado());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdOptionNivelAsociado($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdOptionNivelAsociado && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdOptionNivelAsociado = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdOptionNivelAsociado->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfOpciones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdOptionNivelAsociado(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOptionNivelAsociado || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOptionNivelAsociado) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdOptionNivelAsociado();
            } else {
                $collCiUsuariossRelatedByIdOptionNivelAsociado = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByHbfOpcionesRelatedByIdOptionNivelAsociado($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial && count($collCiUsuariossRelatedByIdOptionNivelAsociado)) {
                        $this->initCiUsuariossRelatedByIdOptionNivelAsociado(false);

                        foreach ($collCiUsuariossRelatedByIdOptionNivelAsociado as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdOptionNivelAsociado->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdOptionNivelAsociado->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial = true;
                    }

                    return $collCiUsuariossRelatedByIdOptionNivelAsociado;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdOptionNivelAsociado) {
                    foreach ($this->collCiUsuariossRelatedByIdOptionNivelAsociado as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdOptionNivelAsociado[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdOptionNivelAsociado = $collCiUsuariossRelatedByIdOptionNivelAsociado;
                $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdOptionNivelAsociado;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdOptionNivelAsociado A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdOptionNivelAsociado(Collection $ciUsuariossRelatedByIdOptionNivelAsociado, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdOptionNivelAsociadoToDelete */
        $ciUsuariossRelatedByIdOptionNivelAsociadoToDelete = $this->getCiUsuariossRelatedByIdOptionNivelAsociado(new Criteria(), $con)->diff($ciUsuariossRelatedByIdOptionNivelAsociado);


        $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion = $ciUsuariossRelatedByIdOptionNivelAsociadoToDelete;

        foreach ($ciUsuariossRelatedByIdOptionNivelAsociadoToDelete as $ciUsuariosRelatedByIdOptionNivelAsociadoRemoved) {
            $ciUsuariosRelatedByIdOptionNivelAsociadoRemoved->setHbfOpcionesRelatedByIdOptionNivelAsociado(null);
        }

        $this->collCiUsuariossRelatedByIdOptionNivelAsociado = null;
        foreach ($ciUsuariossRelatedByIdOptionNivelAsociado as $ciUsuariosRelatedByIdOptionNivelAsociado) {
            $this->addCiUsuariosRelatedByIdOptionNivelAsociado($ciUsuariosRelatedByIdOptionNivelAsociado);
        }

        $this->collCiUsuariossRelatedByIdOptionNivelAsociado = $ciUsuariossRelatedByIdOptionNivelAsociado;
        $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial = false;

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
    public function countCiUsuariossRelatedByIdOptionNivelAsociado(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOptionNivelAsociado || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOptionNivelAsociado) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdOptionNivelAsociado());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfOpcionesRelatedByIdOptionNivelAsociado($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdOptionNivelAsociado);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdOptionNivelAsociado(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdOptionNivelAsociado === null) {
            $this->initCiUsuariossRelatedByIdOptionNivelAsociado();
            $this->collCiUsuariossRelatedByIdOptionNivelAsociadoPartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdOptionNivelAsociado->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdOptionNivelAsociado($l);

            if ($this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion and $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion->remove($this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdOptionNivelAsociado The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdOptionNivelAsociado(ChildCiUsuarios $ciUsuariosRelatedByIdOptionNivelAsociado)
    {
        $this->collCiUsuariossRelatedByIdOptionNivelAsociado[]= $ciUsuariosRelatedByIdOptionNivelAsociado;
        $ciUsuariosRelatedByIdOptionNivelAsociado->setHbfOpcionesRelatedByIdOptionNivelAsociado($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdOptionNivelAsociado The ChildCiUsuarios object to remove.
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdOptionNivelAsociado(ChildCiUsuarios $ciUsuariosRelatedByIdOptionNivelAsociado)
    {
        if ($this->getCiUsuariossRelatedByIdOptionNivelAsociado()->contains($ciUsuariosRelatedByIdOptionNivelAsociado)) {
            $pos = $this->collCiUsuariossRelatedByIdOptionNivelAsociado->search($ciUsuariosRelatedByIdOptionNivelAsociado);
            $this->collCiUsuariossRelatedByIdOptionNivelAsociado->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdOptionNivelAsociado;
                $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion[]= $ciUsuariosRelatedByIdOptionNivelAsociado;
            $ciUsuariosRelatedByIdOptionNivelAsociado->setHbfOpcionesRelatedByIdOptionNivelAsociado(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionNivelAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionNivelAsociadoJoinCiUsuariosRelatedByInvitadoPor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByInvitadoPor', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionNivelAsociado($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionNivelAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionNivelAsociadoJoinHbfTurnosRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnosRelatedByIdTurno', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionNivelAsociado($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionNivelAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionNivelAsociadoJoinHbfSesionesRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfSesionesRelatedByIdSesion', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionNivelAsociado($query, $con);
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
     * If this ChildHbfOpciones is new, it will return
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
                    ->filterByHbfOpciones($this)
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
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function setHbfPrepagoss(Collection $hbfPrepagoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPrepagos[] $hbfPrepagossToDelete */
        $hbfPrepagossToDelete = $this->getHbfPrepagoss(new Criteria(), $con)->diff($hbfPrepagoss);


        $this->hbfPrepagossScheduledForDeletion = $hbfPrepagossToDelete;

        foreach ($hbfPrepagossToDelete as $hbfPrepagosRemoved) {
            $hbfPrepagosRemoved->setHbfOpciones(null);
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
                ->filterByHbfOpciones($this)
                ->count($con);
        }

        return count($this->collHbfPrepagoss);
    }

    /**
     * Method called to associate a ChildHbfPrepagos object to this object
     * through the ChildHbfPrepagos foreign key attribute.
     *
     * @param  ChildHbfPrepagos $l ChildHbfPrepagos
     * @return $this|\HbfOpciones The current object (for fluent API support)
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
        $hbfPrepagos->setHbfOpciones($this);
    }

    /**
     * @param  ChildHbfPrepagos $hbfPrepagos The ChildHbfPrepagos object to remove.
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
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
            $hbfPrepagos->setHbfOpciones(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
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
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
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
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
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
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
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
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
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
     * Clears out the collHbfProductossRelatedByIdOptionCategoriaProducto collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfProductossRelatedByIdOptionCategoriaProducto()
     */
    public function clearHbfProductossRelatedByIdOptionCategoriaProducto()
    {
        $this->collHbfProductossRelatedByIdOptionCategoriaProducto = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfProductossRelatedByIdOptionCategoriaProducto collection loaded partially.
     */
    public function resetPartialHbfProductossRelatedByIdOptionCategoriaProducto($v = true)
    {
        $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial = $v;
    }

    /**
     * Initializes the collHbfProductossRelatedByIdOptionCategoriaProducto collection.
     *
     * By default this just sets the collHbfProductossRelatedByIdOptionCategoriaProducto collection to an empty array (like clearcollHbfProductossRelatedByIdOptionCategoriaProducto());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfProductossRelatedByIdOptionCategoriaProducto($overrideExisting = true)
    {
        if (null !== $this->collHbfProductossRelatedByIdOptionCategoriaProducto && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfProductosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfProductossRelatedByIdOptionCategoriaProducto = new $collectionClassName;
        $this->collHbfProductossRelatedByIdOptionCategoriaProducto->setModel('\HbfProductos');
    }

    /**
     * Gets an array of ChildHbfProductos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfOpciones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     * @throws PropelException
     */
    public function getHbfProductossRelatedByIdOptionCategoriaProducto(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdOptionCategoriaProducto || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdOptionCategoriaProducto) {
                // return empty collection
                $this->initHbfProductossRelatedByIdOptionCategoriaProducto();
            } else {
                $collHbfProductossRelatedByIdOptionCategoriaProducto = ChildHbfProductosQuery::create(null, $criteria)
                    ->filterByHbfOpcionesRelatedByIdOptionCategoriaProducto($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial && count($collHbfProductossRelatedByIdOptionCategoriaProducto)) {
                        $this->initHbfProductossRelatedByIdOptionCategoriaProducto(false);

                        foreach ($collHbfProductossRelatedByIdOptionCategoriaProducto as $obj) {
                            if (false == $this->collHbfProductossRelatedByIdOptionCategoriaProducto->contains($obj)) {
                                $this->collHbfProductossRelatedByIdOptionCategoriaProducto->append($obj);
                            }
                        }

                        $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial = true;
                    }

                    return $collHbfProductossRelatedByIdOptionCategoriaProducto;
                }

                if ($partial && $this->collHbfProductossRelatedByIdOptionCategoriaProducto) {
                    foreach ($this->collHbfProductossRelatedByIdOptionCategoriaProducto as $obj) {
                        if ($obj->isNew()) {
                            $collHbfProductossRelatedByIdOptionCategoriaProducto[] = $obj;
                        }
                    }
                }

                $this->collHbfProductossRelatedByIdOptionCategoriaProducto = $collHbfProductossRelatedByIdOptionCategoriaProducto;
                $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial = false;
            }
        }

        return $this->collHbfProductossRelatedByIdOptionCategoriaProducto;
    }

    /**
     * Sets a collection of ChildHbfProductos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfProductossRelatedByIdOptionCategoriaProducto A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function setHbfProductossRelatedByIdOptionCategoriaProducto(Collection $hbfProductossRelatedByIdOptionCategoriaProducto, ConnectionInterface $con = null)
    {
        /** @var ChildHbfProductos[] $hbfProductossRelatedByIdOptionCategoriaProductoToDelete */
        $hbfProductossRelatedByIdOptionCategoriaProductoToDelete = $this->getHbfProductossRelatedByIdOptionCategoriaProducto(new Criteria(), $con)->diff($hbfProductossRelatedByIdOptionCategoriaProducto);


        $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion = $hbfProductossRelatedByIdOptionCategoriaProductoToDelete;

        foreach ($hbfProductossRelatedByIdOptionCategoriaProductoToDelete as $hbfProductosRelatedByIdOptionCategoriaProductoRemoved) {
            $hbfProductosRelatedByIdOptionCategoriaProductoRemoved->setHbfOpcionesRelatedByIdOptionCategoriaProducto(null);
        }

        $this->collHbfProductossRelatedByIdOptionCategoriaProducto = null;
        foreach ($hbfProductossRelatedByIdOptionCategoriaProducto as $hbfProductosRelatedByIdOptionCategoriaProducto) {
            $this->addHbfProductosRelatedByIdOptionCategoriaProducto($hbfProductosRelatedByIdOptionCategoriaProducto);
        }

        $this->collHbfProductossRelatedByIdOptionCategoriaProducto = $hbfProductossRelatedByIdOptionCategoriaProducto;
        $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial = false;

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
    public function countHbfProductossRelatedByIdOptionCategoriaProducto(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdOptionCategoriaProducto || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdOptionCategoriaProducto) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfProductossRelatedByIdOptionCategoriaProducto());
            }

            $query = ChildHbfProductosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfOpcionesRelatedByIdOptionCategoriaProducto($this)
                ->count($con);
        }

        return count($this->collHbfProductossRelatedByIdOptionCategoriaProducto);
    }

    /**
     * Method called to associate a ChildHbfProductos object to this object
     * through the ChildHbfProductos foreign key attribute.
     *
     * @param  ChildHbfProductos $l ChildHbfProductos
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function addHbfProductosRelatedByIdOptionCategoriaProducto(ChildHbfProductos $l)
    {
        if ($this->collHbfProductossRelatedByIdOptionCategoriaProducto === null) {
            $this->initHbfProductossRelatedByIdOptionCategoriaProducto();
            $this->collHbfProductossRelatedByIdOptionCategoriaProductoPartial = true;
        }

        if (!$this->collHbfProductossRelatedByIdOptionCategoriaProducto->contains($l)) {
            $this->doAddHbfProductosRelatedByIdOptionCategoriaProducto($l);

            if ($this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion and $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion->contains($l)) {
                $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion->remove($this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfProductos $hbfProductosRelatedByIdOptionCategoriaProducto The ChildHbfProductos object to add.
     */
    protected function doAddHbfProductosRelatedByIdOptionCategoriaProducto(ChildHbfProductos $hbfProductosRelatedByIdOptionCategoriaProducto)
    {
        $this->collHbfProductossRelatedByIdOptionCategoriaProducto[]= $hbfProductosRelatedByIdOptionCategoriaProducto;
        $hbfProductosRelatedByIdOptionCategoriaProducto->setHbfOpcionesRelatedByIdOptionCategoriaProducto($this);
    }

    /**
     * @param  ChildHbfProductos $hbfProductosRelatedByIdOptionCategoriaProducto The ChildHbfProductos object to remove.
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function removeHbfProductosRelatedByIdOptionCategoriaProducto(ChildHbfProductos $hbfProductosRelatedByIdOptionCategoriaProducto)
    {
        if ($this->getHbfProductossRelatedByIdOptionCategoriaProducto()->contains($hbfProductosRelatedByIdOptionCategoriaProducto)) {
            $pos = $this->collHbfProductossRelatedByIdOptionCategoriaProducto->search($hbfProductosRelatedByIdOptionCategoriaProducto);
            $this->collHbfProductossRelatedByIdOptionCategoriaProducto->remove($pos);
            if (null === $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion) {
                $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion = clone $this->collHbfProductossRelatedByIdOptionCategoriaProducto;
                $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion->clear();
            }
            $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion[]= clone $hbfProductosRelatedByIdOptionCategoriaProducto;
            $hbfProductosRelatedByIdOptionCategoriaProducto->setHbfOpcionesRelatedByIdOptionCategoriaProducto(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionCategoriaProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdOptionCategoriaProductoJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfProductossRelatedByIdOptionCategoriaProducto($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionCategoriaProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdOptionCategoriaProductoJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfProductossRelatedByIdOptionCategoriaProducto($query, $con);
    }

    /**
     * Clears out the collHbfProductossRelatedByIdOptionTipoProducto collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfProductossRelatedByIdOptionTipoProducto()
     */
    public function clearHbfProductossRelatedByIdOptionTipoProducto()
    {
        $this->collHbfProductossRelatedByIdOptionTipoProducto = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfProductossRelatedByIdOptionTipoProducto collection loaded partially.
     */
    public function resetPartialHbfProductossRelatedByIdOptionTipoProducto($v = true)
    {
        $this->collHbfProductossRelatedByIdOptionTipoProductoPartial = $v;
    }

    /**
     * Initializes the collHbfProductossRelatedByIdOptionTipoProducto collection.
     *
     * By default this just sets the collHbfProductossRelatedByIdOptionTipoProducto collection to an empty array (like clearcollHbfProductossRelatedByIdOptionTipoProducto());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfProductossRelatedByIdOptionTipoProducto($overrideExisting = true)
    {
        if (null !== $this->collHbfProductossRelatedByIdOptionTipoProducto && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfProductosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfProductossRelatedByIdOptionTipoProducto = new $collectionClassName;
        $this->collHbfProductossRelatedByIdOptionTipoProducto->setModel('\HbfProductos');
    }

    /**
     * Gets an array of ChildHbfProductos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildHbfOpciones is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     * @throws PropelException
     */
    public function getHbfProductossRelatedByIdOptionTipoProducto(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdOptionTipoProductoPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdOptionTipoProducto || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdOptionTipoProducto) {
                // return empty collection
                $this->initHbfProductossRelatedByIdOptionTipoProducto();
            } else {
                $collHbfProductossRelatedByIdOptionTipoProducto = ChildHbfProductosQuery::create(null, $criteria)
                    ->filterByHbfOpcionesRelatedByIdOptionTipoProducto($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfProductossRelatedByIdOptionTipoProductoPartial && count($collHbfProductossRelatedByIdOptionTipoProducto)) {
                        $this->initHbfProductossRelatedByIdOptionTipoProducto(false);

                        foreach ($collHbfProductossRelatedByIdOptionTipoProducto as $obj) {
                            if (false == $this->collHbfProductossRelatedByIdOptionTipoProducto->contains($obj)) {
                                $this->collHbfProductossRelatedByIdOptionTipoProducto->append($obj);
                            }
                        }

                        $this->collHbfProductossRelatedByIdOptionTipoProductoPartial = true;
                    }

                    return $collHbfProductossRelatedByIdOptionTipoProducto;
                }

                if ($partial && $this->collHbfProductossRelatedByIdOptionTipoProducto) {
                    foreach ($this->collHbfProductossRelatedByIdOptionTipoProducto as $obj) {
                        if ($obj->isNew()) {
                            $collHbfProductossRelatedByIdOptionTipoProducto[] = $obj;
                        }
                    }
                }

                $this->collHbfProductossRelatedByIdOptionTipoProducto = $collHbfProductossRelatedByIdOptionTipoProducto;
                $this->collHbfProductossRelatedByIdOptionTipoProductoPartial = false;
            }
        }

        return $this->collHbfProductossRelatedByIdOptionTipoProducto;
    }

    /**
     * Sets a collection of ChildHbfProductos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfProductossRelatedByIdOptionTipoProducto A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function setHbfProductossRelatedByIdOptionTipoProducto(Collection $hbfProductossRelatedByIdOptionTipoProducto, ConnectionInterface $con = null)
    {
        /** @var ChildHbfProductos[] $hbfProductossRelatedByIdOptionTipoProductoToDelete */
        $hbfProductossRelatedByIdOptionTipoProductoToDelete = $this->getHbfProductossRelatedByIdOptionTipoProducto(new Criteria(), $con)->diff($hbfProductossRelatedByIdOptionTipoProducto);


        $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion = $hbfProductossRelatedByIdOptionTipoProductoToDelete;

        foreach ($hbfProductossRelatedByIdOptionTipoProductoToDelete as $hbfProductosRelatedByIdOptionTipoProductoRemoved) {
            $hbfProductosRelatedByIdOptionTipoProductoRemoved->setHbfOpcionesRelatedByIdOptionTipoProducto(null);
        }

        $this->collHbfProductossRelatedByIdOptionTipoProducto = null;
        foreach ($hbfProductossRelatedByIdOptionTipoProducto as $hbfProductosRelatedByIdOptionTipoProducto) {
            $this->addHbfProductosRelatedByIdOptionTipoProducto($hbfProductosRelatedByIdOptionTipoProducto);
        }

        $this->collHbfProductossRelatedByIdOptionTipoProducto = $hbfProductossRelatedByIdOptionTipoProducto;
        $this->collHbfProductossRelatedByIdOptionTipoProductoPartial = false;

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
    public function countHbfProductossRelatedByIdOptionTipoProducto(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfProductossRelatedByIdOptionTipoProductoPartial && !$this->isNew();
        if (null === $this->collHbfProductossRelatedByIdOptionTipoProducto || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfProductossRelatedByIdOptionTipoProducto) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfProductossRelatedByIdOptionTipoProducto());
            }

            $query = ChildHbfProductosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByHbfOpcionesRelatedByIdOptionTipoProducto($this)
                ->count($con);
        }

        return count($this->collHbfProductossRelatedByIdOptionTipoProducto);
    }

    /**
     * Method called to associate a ChildHbfProductos object to this object
     * through the ChildHbfProductos foreign key attribute.
     *
     * @param  ChildHbfProductos $l ChildHbfProductos
     * @return $this|\HbfOpciones The current object (for fluent API support)
     */
    public function addHbfProductosRelatedByIdOptionTipoProducto(ChildHbfProductos $l)
    {
        if ($this->collHbfProductossRelatedByIdOptionTipoProducto === null) {
            $this->initHbfProductossRelatedByIdOptionTipoProducto();
            $this->collHbfProductossRelatedByIdOptionTipoProductoPartial = true;
        }

        if (!$this->collHbfProductossRelatedByIdOptionTipoProducto->contains($l)) {
            $this->doAddHbfProductosRelatedByIdOptionTipoProducto($l);

            if ($this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion and $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion->contains($l)) {
                $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion->remove($this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfProductos $hbfProductosRelatedByIdOptionTipoProducto The ChildHbfProductos object to add.
     */
    protected function doAddHbfProductosRelatedByIdOptionTipoProducto(ChildHbfProductos $hbfProductosRelatedByIdOptionTipoProducto)
    {
        $this->collHbfProductossRelatedByIdOptionTipoProducto[]= $hbfProductosRelatedByIdOptionTipoProducto;
        $hbfProductosRelatedByIdOptionTipoProducto->setHbfOpcionesRelatedByIdOptionTipoProducto($this);
    }

    /**
     * @param  ChildHbfProductos $hbfProductosRelatedByIdOptionTipoProducto The ChildHbfProductos object to remove.
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function removeHbfProductosRelatedByIdOptionTipoProducto(ChildHbfProductos $hbfProductosRelatedByIdOptionTipoProducto)
    {
        if ($this->getHbfProductossRelatedByIdOptionTipoProducto()->contains($hbfProductosRelatedByIdOptionTipoProducto)) {
            $pos = $this->collHbfProductossRelatedByIdOptionTipoProducto->search($hbfProductosRelatedByIdOptionTipoProducto);
            $this->collHbfProductossRelatedByIdOptionTipoProducto->remove($pos);
            if (null === $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion) {
                $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion = clone $this->collHbfProductossRelatedByIdOptionTipoProducto;
                $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion->clear();
            }
            $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion[]= clone $hbfProductosRelatedByIdOptionTipoProducto;
            $hbfProductosRelatedByIdOptionTipoProducto->setHbfOpcionesRelatedByIdOptionTipoProducto(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionTipoProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdOptionTipoProductoJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfProductossRelatedByIdOptionTipoProducto($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionTipoProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfProductos[] List of ChildHbfProductos objects
     */
    public function getHbfProductossRelatedByIdOptionTipoProductoJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfProductosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfProductossRelatedByIdOptionTipoProducto($query, $con);
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
     * If this ChildHbfOpciones is new, it will return
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
                    ->filterByHbfOpciones($this)
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
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
     */
    public function setHbfVasoss(Collection $hbfVasoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVasos[] $hbfVasossToDelete */
        $hbfVasossToDelete = $this->getHbfVasoss(new Criteria(), $con)->diff($hbfVasoss);


        $this->hbfVasossScheduledForDeletion = $hbfVasossToDelete;

        foreach ($hbfVasossToDelete as $hbfVasosRemoved) {
            $hbfVasosRemoved->setHbfOpciones(null);
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
                ->filterByHbfOpciones($this)
                ->count($con);
        }

        return count($this->collHbfVasoss);
    }

    /**
     * Method called to associate a ChildHbfVasos object to this object
     * through the ChildHbfVasos foreign key attribute.
     *
     * @param  ChildHbfVasos $l ChildHbfVasos
     * @return $this|\HbfOpciones The current object (for fluent API support)
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
        $hbfVasos->setHbfOpciones($this);
    }

    /**
     * @param  ChildHbfVasos $hbfVasos The ChildHbfVasos object to remove.
     * @return $this|ChildHbfOpciones The current object (for fluent API support)
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
            $hbfVasos->setHbfOpciones(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
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
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
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
     * Otherwise if this HbfOpciones is new, it will return
     * an empty collection; or if this HbfOpciones has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfOpciones.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfVasos[] List of ChildHbfVasos objects
     */
    public function getHbfVasossJoinHbfComandas(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfVasosQuery::create(null, $criteria);
        $query->joinWith('HbfComandas', $joinBehavior);

        return $this->getHbfVasoss($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {
            $this->aCiUsuariosRelatedByIdUserCreated->removeHbfOpcionesRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeHbfOpcionesRelatedByIdUserModified($this);
        }
        $this->id_option = null;
        $this->tabla = null;
        $this->tipo = null;
        $this->nombre = null;
        $this->descripcion = null;
        $this->precio = null;
        $this->num_fichas = null;
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
            if ($this->collCiUsuariossRelatedByIdOptionTipoAsociado) {
                foreach ($this->collCiUsuariossRelatedByIdOptionTipoAsociado as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdOptionTipoRole) {
                foreach ($this->collCiUsuariossRelatedByIdOptionTipoRole as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdOptionNivelAsociado) {
                foreach ($this->collCiUsuariossRelatedByIdOptionNivelAsociado as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfPrepagoss) {
                foreach ($this->collHbfPrepagoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfProductossRelatedByIdOptionCategoriaProducto) {
                foreach ($this->collHbfProductossRelatedByIdOptionCategoriaProducto as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfProductossRelatedByIdOptionTipoProducto) {
                foreach ($this->collHbfProductossRelatedByIdOptionTipoProducto as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVasoss) {
                foreach ($this->collHbfVasoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCiUsuariossRelatedByIdOptionTipoAsociado = null;
        $this->collCiUsuariossRelatedByIdOptionTipoRole = null;
        $this->collCiUsuariossRelatedByIdOptionNivelAsociado = null;
        $this->collHbfPrepagoss = null;
        $this->collHbfProductossRelatedByIdOptionCategoriaProducto = null;
        $this->collHbfProductossRelatedByIdOptionTipoProducto = null;
        $this->collHbfVasoss = null;
        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(HbfOpcionesTableMap::DEFAULT_STRING_FORMAT);
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
