<?php

namespace Base;

use \CiModulosQuery as ChildCiModulosQuery;
use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CiModulosTableMap;
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
 * Base class that represents a row from the 'ci_modulos' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class CiModulos implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CiModulosTableMap';


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
     * The value for the id_modulo field.
     *
     * @var        int
     */
    protected $id_modulo;

    /**
     * The value for the id_opcion_modulo field.
     *
     * @var        int
     */
    protected $id_opcion_modulo;

    /**
     * The value for the id_opcion_roles field.
     *
     * @var        int
     */
    protected $id_opcion_roles;

    /**
     * The value for the titulo field.
     *
     * @var        string
     */
    protected $titulo;

    /**
     * The value for the tabla field.
     *
     * @var        string
     */
    protected $tabla;

    /**
     * The value for the listed field.
     *
     * Note: this column has a database default value of: 'ENABLED'
     * @var        string
     */
    protected $listed;

    /**
     * The value for the descripcion field.
     *
     * @var        string
     */
    protected $descripcion;

    /**
     * The value for the icon field.
     *
     * @var        string
     */
    protected $icon;

    /**
     * The value for the url field.
     *
     * @var        string
     */
    protected $url;

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
    protected $aCiOptionsRelatedByIdOpcionModulo;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptionsRelatedByIdOpcionRoles;

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
        $this->listed = 'ENABLED';
        $this->estado = 'ENABLED';
        $this->change_count = 0;
    }

    /**
     * Initializes internal state of Base\CiModulos object.
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
     * Compares this with another <code>CiModulos</code> instance.  If
     * <code>obj</code> is an instance of <code>CiModulos</code>, delegates to
     * <code>equals(CiModulos)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|CiModulos The current object, for fluid interface
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
     * Get the [id_modulo] column value.
     *
     * @return int
     */
    public function getIdModulo()
    {
        return $this->id_modulo;
    }

    /**
     * Get the [id_opcion_modulo] column value.
     *
     * @return int
     */
    public function getIdOpcionModulo()
    {
        return $this->id_opcion_modulo;
    }

    /**
     * Get the [id_opcion_roles] column value.
     *
     * @return int
     */
    public function getIdOpcionRoles()
    {
        return $this->id_opcion_roles;
    }

    /**
     * Get the [titulo] column value.
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
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
     * Get the [listed] column value.
     *
     * @return string
     */
    public function getListed()
    {
        return $this->listed;
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
     * Get the [icon] column value.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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
     * Set the value of [id_modulo] column.
     *
     * @param int $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setIdModulo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_modulo !== $v) {
            $this->id_modulo = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_ID_MODULO] = true;
        }

        return $this;
    } // setIdModulo()

    /**
     * Set the value of [id_opcion_modulo] column.
     *
     * @param int $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setIdOpcionModulo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_opcion_modulo !== $v) {
            $this->id_opcion_modulo = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_ID_OPCION_MODULO] = true;
        }

        if ($this->aCiOptionsRelatedByIdOpcionModulo !== null && $this->aCiOptionsRelatedByIdOpcionModulo->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdOpcionModulo = null;
        }

        return $this;
    } // setIdOpcionModulo()

    /**
     * Set the value of [id_opcion_roles] column.
     *
     * @param int $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setIdOpcionRoles($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_opcion_roles !== $v) {
            $this->id_opcion_roles = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_ID_OPCION_ROLES] = true;
        }

        if ($this->aCiOptionsRelatedByIdOpcionRoles !== null && $this->aCiOptionsRelatedByIdOpcionRoles->getIdOption() !== $v) {
            $this->aCiOptionsRelatedByIdOpcionRoles = null;
        }

        return $this;
    } // setIdOpcionRoles()

    /**
     * Set the value of [titulo] column.
     *
     * @param string $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setTitulo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->titulo !== $v) {
            $this->titulo = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_TITULO] = true;
        }

        return $this;
    } // setTitulo()

    /**
     * Set the value of [tabla] column.
     *
     * @param string $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setTabla($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tabla !== $v) {
            $this->tabla = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_TABLA] = true;
        }

        return $this;
    } // setTabla()

    /**
     * Set the value of [listed] column.
     *
     * @param string $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setListed($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->listed !== $v) {
            $this->listed = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_LISTED] = true;
        }

        return $this;
    } // setListed()

    /**
     * Set the value of [descripcion] column.
     *
     * @param string $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_DESCRIPCION] = true;
        }

        return $this;
    } // setDescripcion()

    /**
     * Set the value of [icon] column.
     *
     * @param string $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setIcon($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->icon !== $v) {
            $this->icon = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_ICON] = true;
        }

        return $this;
    } // setIcon()

    /**
     * Set the value of [url] column.
     *
     * @param string $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_URL] = true;
        }

        return $this;
    } // setUrl()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[CiModulosTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CiModulosTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CiModulos The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CiModulosTableMap::COL_DATE_CREATED] = true;
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
            if ($this->listed !== 'ENABLED') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CiModulosTableMap::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_modulo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CiModulosTableMap::translateFieldName('IdOpcionModulo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_opcion_modulo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CiModulosTableMap::translateFieldName('IdOpcionRoles', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_opcion_roles = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CiModulosTableMap::translateFieldName('Titulo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->titulo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CiModulosTableMap::translateFieldName('Tabla', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tabla = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CiModulosTableMap::translateFieldName('Listed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->listed = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CiModulosTableMap::translateFieldName('Descripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CiModulosTableMap::translateFieldName('Icon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->icon = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CiModulosTableMap::translateFieldName('Url', TableMap::TYPE_PHPNAME, $indexType)];
            $this->url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CiModulosTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CiModulosTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CiModulosTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CiModulosTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CiModulosTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CiModulosTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = CiModulosTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CiModulos'), 0, $e);
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
        if ($this->aCiOptionsRelatedByIdOpcionModulo !== null && $this->id_opcion_modulo !== $this->aCiOptionsRelatedByIdOpcionModulo->getIdOption()) {
            $this->aCiOptionsRelatedByIdOpcionModulo = null;
        }
        if ($this->aCiOptionsRelatedByIdOpcionRoles !== null && $this->id_opcion_roles !== $this->aCiOptionsRelatedByIdOpcionRoles->getIdOption()) {
            $this->aCiOptionsRelatedByIdOpcionRoles = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(CiModulosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCiModulosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aCiOptionsRelatedByIdOpcionModulo = null;
            $this->aCiOptionsRelatedByIdOpcionRoles = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CiModulos::setDeleted()
     * @see CiModulos::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiModulosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCiModulosQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CiModulosTableMap::DATABASE_NAME);
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
                CiModulosTableMap::addInstanceToPool($this);
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

            if ($this->aCiOptionsRelatedByIdOpcionModulo !== null) {
                if ($this->aCiOptionsRelatedByIdOpcionModulo->isModified() || $this->aCiOptionsRelatedByIdOpcionModulo->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdOpcionModulo->save($con);
                }
                $this->setCiOptionsRelatedByIdOpcionModulo($this->aCiOptionsRelatedByIdOpcionModulo);
            }

            if ($this->aCiOptionsRelatedByIdOpcionRoles !== null) {
                if ($this->aCiOptionsRelatedByIdOpcionRoles->isModified() || $this->aCiOptionsRelatedByIdOpcionRoles->isNew()) {
                    $affectedRows += $this->aCiOptionsRelatedByIdOpcionRoles->save($con);
                }
                $this->setCiOptionsRelatedByIdOpcionRoles($this->aCiOptionsRelatedByIdOpcionRoles);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_MODULO)) {
            $modifiedColumns[':p' . $index++]  = 'id_modulo';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_OPCION_MODULO)) {
            $modifiedColumns[':p' . $index++]  = 'id_opcion_modulo';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_OPCION_ROLES)) {
            $modifiedColumns[':p' . $index++]  = 'id_opcion_roles';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_TITULO)) {
            $modifiedColumns[':p' . $index++]  = 'titulo';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_TABLA)) {
            $modifiedColumns[':p' . $index++]  = 'tabla';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_LISTED)) {
            $modifiedColumns[':p' . $index++]  = 'listed';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'descripcion';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ICON)) {
            $modifiedColumns[':p' . $index++]  = 'icon';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_URL)) {
            $modifiedColumns[':p' . $index++]  = 'url';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO ci_modulos (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_modulo':
                        $stmt->bindValue($identifier, $this->id_modulo, PDO::PARAM_INT);
                        break;
                    case 'id_opcion_modulo':
                        $stmt->bindValue($identifier, $this->id_opcion_modulo, PDO::PARAM_INT);
                        break;
                    case 'id_opcion_roles':
                        $stmt->bindValue($identifier, $this->id_opcion_roles, PDO::PARAM_INT);
                        break;
                    case 'titulo':
                        $stmt->bindValue($identifier, $this->titulo, PDO::PARAM_STR);
                        break;
                    case 'tabla':
                        $stmt->bindValue($identifier, $this->tabla, PDO::PARAM_STR);
                        break;
                    case 'listed':
                        $stmt->bindValue($identifier, $this->listed, PDO::PARAM_STR);
                        break;
                    case 'descripcion':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case 'icon':
                        $stmt->bindValue($identifier, $this->icon, PDO::PARAM_STR);
                        break;
                    case 'url':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
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
        $pos = CiModulosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdModulo();
                break;
            case 1:
                return $this->getIdOpcionModulo();
                break;
            case 2:
                return $this->getIdOpcionRoles();
                break;
            case 3:
                return $this->getTitulo();
                break;
            case 4:
                return $this->getTabla();
                break;
            case 5:
                return $this->getListed();
                break;
            case 6:
                return $this->getDescripcion();
                break;
            case 7:
                return $this->getIcon();
                break;
            case 8:
                return $this->getUrl();
                break;
            case 9:
                return $this->getEstado();
                break;
            case 10:
                return $this->getChangeCount();
                break;
            case 11:
                return $this->getIdUserModified();
                break;
            case 12:
                return $this->getIdUserCreated();
                break;
            case 13:
                return $this->getDateModified();
                break;
            case 14:
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

        if (isset($alreadyDumpedObjects['CiModulos'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CiModulos'][$this->hashCode()] = true;
        $keys = CiModulosTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdModulo(),
            $keys[1] => $this->getIdOpcionModulo(),
            $keys[2] => $this->getIdOpcionRoles(),
            $keys[3] => $this->getTitulo(),
            $keys[4] => $this->getTabla(),
            $keys[5] => $this->getListed(),
            $keys[6] => $this->getDescripcion(),
            $keys[7] => $this->getIcon(),
            $keys[8] => $this->getUrl(),
            $keys[9] => $this->getEstado(),
            $keys[10] => $this->getChangeCount(),
            $keys[11] => $this->getIdUserModified(),
            $keys[12] => $this->getIdUserCreated(),
            $keys[13] => $this->getDateModified(),
            $keys[14] => $this->getDateCreated(),
        );
        if ($result[$keys[13]] instanceof \DateTimeInterface) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
        }

        if ($result[$keys[14]] instanceof \DateTimeInterface) {
            $result[$keys[14]] = $result[$keys[14]]->format('c');
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
            if (null !== $this->aCiOptionsRelatedByIdOpcionModulo) {

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

                $result[$key] = $this->aCiOptionsRelatedByIdOpcionModulo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCiOptionsRelatedByIdOpcionRoles) {

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

                $result[$key] = $this->aCiOptionsRelatedByIdOpcionRoles->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\CiModulos
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CiModulosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CiModulos
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdModulo($value);
                break;
            case 1:
                $this->setIdOpcionModulo($value);
                break;
            case 2:
                $this->setIdOpcionRoles($value);
                break;
            case 3:
                $this->setTitulo($value);
                break;
            case 4:
                $this->setTabla($value);
                break;
            case 5:
                $this->setListed($value);
                break;
            case 6:
                $this->setDescripcion($value);
                break;
            case 7:
                $this->setIcon($value);
                break;
            case 8:
                $this->setUrl($value);
                break;
            case 9:
                $this->setEstado($value);
                break;
            case 10:
                $this->setChangeCount($value);
                break;
            case 11:
                $this->setIdUserModified($value);
                break;
            case 12:
                $this->setIdUserCreated($value);
                break;
            case 13:
                $this->setDateModified($value);
                break;
            case 14:
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
        $keys = CiModulosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdModulo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdOpcionModulo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdOpcionRoles($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTitulo($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTabla($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setListed($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDescripcion($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setIcon($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setUrl($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setEstado($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setChangeCount($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setIdUserModified($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIdUserCreated($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setDateModified($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDateCreated($arr[$keys[14]]);
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
     * @return $this|\CiModulos The current object, for fluid interface
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
        $criteria = new Criteria(CiModulosTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CiModulosTableMap::COL_ID_MODULO)) {
            $criteria->add(CiModulosTableMap::COL_ID_MODULO, $this->id_modulo);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_OPCION_MODULO)) {
            $criteria->add(CiModulosTableMap::COL_ID_OPCION_MODULO, $this->id_opcion_modulo);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_OPCION_ROLES)) {
            $criteria->add(CiModulosTableMap::COL_ID_OPCION_ROLES, $this->id_opcion_roles);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_TITULO)) {
            $criteria->add(CiModulosTableMap::COL_TITULO, $this->titulo);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_TABLA)) {
            $criteria->add(CiModulosTableMap::COL_TABLA, $this->tabla);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_LISTED)) {
            $criteria->add(CiModulosTableMap::COL_LISTED, $this->listed);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_DESCRIPCION)) {
            $criteria->add(CiModulosTableMap::COL_DESCRIPCION, $this->descripcion);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ICON)) {
            $criteria->add(CiModulosTableMap::COL_ICON, $this->icon);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_URL)) {
            $criteria->add(CiModulosTableMap::COL_URL, $this->url);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ESTADO)) {
            $criteria->add(CiModulosTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(CiModulosTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(CiModulosTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(CiModulosTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(CiModulosTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(CiModulosTableMap::COL_DATE_CREATED)) {
            $criteria->add(CiModulosTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildCiModulosQuery::create();
        $criteria->add(CiModulosTableMap::COL_ID_MODULO, $this->id_modulo);

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
        $validPk = null !== $this->getIdModulo();

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
        return $this->getIdModulo();
    }

    /**
     * Generic method to set the primary key (id_modulo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdModulo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdModulo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CiModulos (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdModulo($this->getIdModulo());
        $copyObj->setIdOpcionModulo($this->getIdOpcionModulo());
        $copyObj->setIdOpcionRoles($this->getIdOpcionRoles());
        $copyObj->setTitulo($this->getTitulo());
        $copyObj->setTabla($this->getTabla());
        $copyObj->setListed($this->getListed());
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setIcon($this->getIcon());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setEstado($this->getEstado());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());
        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \CiModulos Clone of current object.
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
     * @return $this|\CiModulos The current object (for fluent API support)
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
            $v->addCiModulosRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addCiModulossRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\CiModulos The current object (for fluent API support)
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
            $v->addCiModulosRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addCiModulossRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\CiModulos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdOpcionModulo(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOpcionModulo(NULL);
        } else {
            $this->setIdOpcionModulo($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdOpcionModulo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addCiModulosRelatedByIdOpcionModulo($this);
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
    public function getCiOptionsRelatedByIdOpcionModulo(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdOpcionModulo === null && ($this->id_opcion_modulo != 0)) {
            $this->aCiOptionsRelatedByIdOpcionModulo = ChildCiOptionsQuery::create()->findPk($this->id_opcion_modulo, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdOpcionModulo->addCiModulossRelatedByIdOpcionModulo($this);
             */
        }

        return $this->aCiOptionsRelatedByIdOpcionModulo;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\CiModulos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptionsRelatedByIdOpcionRoles(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOpcionRoles(NULL);
        } else {
            $this->setIdOpcionRoles($v->getIdOption());
        }

        $this->aCiOptionsRelatedByIdOpcionRoles = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addCiModulosRelatedByIdOpcionRoles($this);
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
    public function getCiOptionsRelatedByIdOpcionRoles(ConnectionInterface $con = null)
    {
        if ($this->aCiOptionsRelatedByIdOpcionRoles === null && ($this->id_opcion_roles != 0)) {
            $this->aCiOptionsRelatedByIdOpcionRoles = ChildCiOptionsQuery::create()->findPk($this->id_opcion_roles, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptionsRelatedByIdOpcionRoles->addCiModulossRelatedByIdOpcionRoles($this);
             */
        }

        return $this->aCiOptionsRelatedByIdOpcionRoles;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {
            $this->aCiUsuariosRelatedByIdUserCreated->removeCiModulosRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeCiModulosRelatedByIdUserModified($this);
        }
        if (null !== $this->aCiOptionsRelatedByIdOpcionModulo) {
            $this->aCiOptionsRelatedByIdOpcionModulo->removeCiModulosRelatedByIdOpcionModulo($this);
        }
        if (null !== $this->aCiOptionsRelatedByIdOpcionRoles) {
            $this->aCiOptionsRelatedByIdOpcionRoles->removeCiModulosRelatedByIdOpcionRoles($this);
        }
        $this->id_modulo = null;
        $this->id_opcion_modulo = null;
        $this->id_opcion_roles = null;
        $this->titulo = null;
        $this->tabla = null;
        $this->listed = null;
        $this->descripcion = null;
        $this->icon = null;
        $this->url = null;
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
        $this->aCiOptionsRelatedByIdOpcionModulo = null;
        $this->aCiOptionsRelatedByIdOpcionRoles = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CiModulosTableMap::DEFAULT_STRING_FORMAT);
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
