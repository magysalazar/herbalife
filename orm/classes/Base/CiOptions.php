<?php

namespace Base;

use \CiModulos as ChildCiModulos;
use \CiModulosQuery as ChildCiModulosQuery;
use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
use \CiSettings as ChildCiSettings;
use \CiSettingsQuery as ChildCiSettingsQuery;
use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
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
use \DateTime;
use \Exception;
use \PDO;
use Map\CiModulosTableMap;
use Map\CiOptionsTableMap;
use Map\CiUsuariosTableMap;
use Map\HbfPrepagosTableMap;
use Map\HbfProductosTableMap;
use Map\HbfSesionesTableMap;
use Map\HbfTurnosTableMap;
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
 * Base class that represents a row from the 'ci_options' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class CiOptions implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CiOptionsTableMap';


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
     * The value for the id_setting field.
     *
     * @var        int
     */
    protected $id_setting;

    /**
     * The value for the nivel field.
     *
     * @var        string
     */
    protected $nivel;

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
     * The value for the id_modulo field.
     *
     * @var        int
     */
    protected $id_modulo;

    /**
     * The value for the edit_tag field.
     *
     * @var        string
     */
    protected $edit_tag;

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
     * @var        ChildCiSettings
     */
    protected $aCiSettings;

    /**
     * @var        ObjectCollection|ChildCiModulos[] Collection to store aggregation of ChildCiModulos objects.
     */
    protected $collCiModulossRelatedByIdOpcionModulo;
    protected $collCiModulossRelatedByIdOpcionModuloPartial;

    /**
     * @var        ObjectCollection|ChildCiModulos[] Collection to store aggregation of ChildCiModulos objects.
     */
    protected $collCiModulossRelatedByIdOpcionRoles;
    protected $collCiModulossRelatedByIdOpcionRolesPartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdOptionTipoAsociado;
    protected $collCiUsuariossRelatedByIdOptionTipoAsociadoPartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdOptionNivelAsociado;
    protected $collCiUsuariossRelatedByIdOptionNivelAsociadoPartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdOpcionRole;
    protected $collCiUsuariossRelatedByIdOpcionRolePartial;

    /**
     * @var        ObjectCollection|ChildCiUsuarios[] Collection to store aggregation of ChildCiUsuarios objects.
     */
    protected $collCiUsuariossRelatedByIdTipoUsuario;
    protected $collCiUsuariossRelatedByIdTipoUsuarioPartial;

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
     * @var        ObjectCollection|ChildHbfSesiones[] Collection to store aggregation of ChildHbfSesiones objects.
     */
    protected $collHbfSesioness;
    protected $collHbfSesionessPartial;

    /**
     * @var        ObjectCollection|ChildHbfTurnos[] Collection to store aggregation of ChildHbfTurnos objects.
     */
    protected $collHbfTurnoss;
    protected $collHbfTurnossPartial;

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
     * @var ObjectCollection|ChildCiModulos[]
     */
    protected $ciModulossRelatedByIdOpcionModuloScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiModulos[]
     */
    protected $ciModulossRelatedByIdOpcionRolesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCiUsuarios[]
     */
    protected $ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion = null;

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
     * @var ObjectCollection|ChildHbfSesiones[]
     */
    protected $hbfSesionessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfTurnos[]
     */
    protected $hbfTurnossScheduledForDeletion = null;

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
     * Initializes internal state of Base\CiOptions object.
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
     * Compares this with another <code>CiOptions</code> instance.  If
     * <code>obj</code> is an instance of <code>CiOptions</code>, delegates to
     * <code>equals(CiOptions)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|CiOptions The current object, for fluid interface
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
     * Get the [id_setting] column value.
     *
     * @return int
     */
    public function getIdSetting()
    {
        return $this->id_setting;
    }

    /**
     * Get the [nivel] column value.
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
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
     * Get the [id_modulo] column value.
     *
     * @return int
     */
    public function getIdModulo()
    {
        return $this->id_modulo;
    }

    /**
     * Get the [edit_tag] column value.
     *
     * @return string
     */
    public function getEditTag()
    {
        return $this->edit_tag;
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
     * Set the value of [id_option] column.
     *
     * @param int $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setIdOption($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_option !== $v) {
            $this->id_option = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_ID_OPTION] = true;
        }

        return $this;
    } // setIdOption()

    /**
     * Set the value of [nombre] column.
     *
     * @param string $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_NOMBRE] = true;
        }

        return $this;
    } // setNombre()

    /**
     * Set the value of [descripcion] column.
     *
     * @param string $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_DESCRIPCION] = true;
        }

        return $this;
    } // setDescripcion()

    /**
     * Set the value of [id_setting] column.
     *
     * @param int $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setIdSetting($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_setting !== $v) {
            $this->id_setting = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_ID_SETTING] = true;
        }

        if ($this->aCiSettings !== null && $this->aCiSettings->getIdSetting() !== $v) {
            $this->aCiSettings = null;
        }

        return $this;
    } // setIdSetting()

    /**
     * Set the value of [nivel] column.
     *
     * @param string $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setNivel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nivel !== $v) {
            $this->nivel = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_NIVEL] = true;
        }

        return $this;
    } // setNivel()

    /**
     * Set the value of [precio] column.
     *
     * @param string $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setPrecio($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->precio !== $v) {
            $this->precio = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_PRECIO] = true;
        }

        return $this;
    } // setPrecio()

    /**
     * Set the value of [num_fichas] column.
     *
     * @param int $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setNumFichas($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->num_fichas !== $v) {
            $this->num_fichas = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_NUM_FICHAS] = true;
        }

        return $this;
    } // setNumFichas()

    /**
     * Set the value of [id_modulo] column.
     *
     * @param int $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setIdModulo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_modulo !== $v) {
            $this->id_modulo = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_ID_MODULO] = true;
        }

        return $this;
    } // setIdModulo()

    /**
     * Set the value of [edit_tag] column.
     *
     * @param string $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setEditTag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->edit_tag !== $v) {
            $this->edit_tag = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_EDIT_TAG] = true;
        }

        return $this;
    } // setEditTag()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[CiOptionsTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CiOptionsTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CiOptionsTableMap::COL_DATE_CREATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CiOptionsTableMap::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_option = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CiOptionsTableMap::translateFieldName('Nombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CiOptionsTableMap::translateFieldName('Descripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CiOptionsTableMap::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_setting = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CiOptionsTableMap::translateFieldName('Nivel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nivel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CiOptionsTableMap::translateFieldName('Precio', TableMap::TYPE_PHPNAME, $indexType)];
            $this->precio = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CiOptionsTableMap::translateFieldName('NumFichas', TableMap::TYPE_PHPNAME, $indexType)];
            $this->num_fichas = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CiOptionsTableMap::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_modulo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CiOptionsTableMap::translateFieldName('EditTag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->edit_tag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CiOptionsTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CiOptionsTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CiOptionsTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CiOptionsTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CiOptionsTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CiOptionsTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = CiOptionsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CiOptions'), 0, $e);
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
        if ($this->aCiSettings !== null && $this->id_setting !== $this->aCiSettings->getIdSetting()) {
            $this->aCiSettings = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(CiOptionsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCiOptionsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aCiSettings = null;
            $this->collCiModulossRelatedByIdOpcionModulo = null;

            $this->collCiModulossRelatedByIdOpcionRoles = null;

            $this->collCiUsuariossRelatedByIdOptionTipoAsociado = null;

            $this->collCiUsuariossRelatedByIdOptionNivelAsociado = null;

            $this->collCiUsuariossRelatedByIdOpcionRole = null;

            $this->collCiUsuariossRelatedByIdTipoUsuario = null;

            $this->collHbfPrepagoss = null;

            $this->collHbfProductossRelatedByIdOptionCategoriaProducto = null;

            $this->collHbfProductossRelatedByIdOptionTipoProducto = null;

            $this->collHbfSesioness = null;

            $this->collHbfTurnoss = null;

            $this->collHbfVasoss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CiOptions::setDeleted()
     * @see CiOptions::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiOptionsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCiOptionsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CiOptionsTableMap::DATABASE_NAME);
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
                CiOptionsTableMap::addInstanceToPool($this);
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

            if ($this->aCiSettings !== null) {
                if ($this->aCiSettings->isModified() || $this->aCiSettings->isNew()) {
                    $affectedRows += $this->aCiSettings->save($con);
                }
                $this->setCiSettings($this->aCiSettings);
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

            if ($this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion !== null) {
                if (!$this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion as $ciModulosRelatedByIdOpcionModulo) {
                        // need to save related object because we set the relation to null
                        $ciModulosRelatedByIdOpcionModulo->save($con);
                    }
                    $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion = null;
                }
            }

            if ($this->collCiModulossRelatedByIdOpcionModulo !== null) {
                foreach ($this->collCiModulossRelatedByIdOpcionModulo as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion !== null) {
                if (!$this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion as $ciModulosRelatedByIdOpcionRoles) {
                        // need to save related object because we set the relation to null
                        $ciModulosRelatedByIdOpcionRoles->save($con);
                    }
                    $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion = null;
                }
            }

            if ($this->collCiModulossRelatedByIdOpcionRoles !== null) {
                foreach ($this->collCiModulossRelatedByIdOpcionRoles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion as $ciUsuariosRelatedByIdOpcionRole) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdOpcionRole->save($con);
                    }
                    $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdOpcionRole !== null) {
                foreach ($this->collCiUsuariossRelatedByIdOpcionRole as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion !== null) {
                if (!$this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion->isEmpty()) {
                    foreach ($this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion as $ciUsuariosRelatedByIdTipoUsuario) {
                        // need to save related object because we set the relation to null
                        $ciUsuariosRelatedByIdTipoUsuario->save($con);
                    }
                    $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion = null;
                }
            }

            if ($this->collCiUsuariossRelatedByIdTipoUsuario !== null) {
                foreach ($this->collCiUsuariossRelatedByIdTipoUsuario as $referrerFK) {
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

            if ($this->hbfSesionessScheduledForDeletion !== null) {
                if (!$this->hbfSesionessScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfSesionessScheduledForDeletion as $hbfSesiones) {
                        // need to save related object because we set the relation to null
                        $hbfSesiones->save($con);
                    }
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

            if ($this->hbfTurnossScheduledForDeletion !== null) {
                if (!$this->hbfTurnossScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfTurnossScheduledForDeletion as $hbfTurnos) {
                        // need to save related object because we set the relation to null
                        $hbfTurnos->save($con);
                    }
                    $this->hbfTurnossScheduledForDeletion = null;
                }
            }

            if ($this->collHbfTurnoss !== null) {
                foreach ($this->collHbfTurnoss as $referrerFK) {
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

        $this->modifiedColumns[CiOptionsTableMap::COL_ID_OPTION] = true;
        if (null !== $this->id_option) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CiOptionsTableMap::COL_ID_OPTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_OPTION)) {
            $modifiedColumns[':p' . $index++]  = 'id_option';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'nombre';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'descripcion';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_SETTING)) {
            $modifiedColumns[':p' . $index++]  = 'id_setting';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_NIVEL)) {
            $modifiedColumns[':p' . $index++]  = 'nivel';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_PRECIO)) {
            $modifiedColumns[':p' . $index++]  = 'precio';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_NUM_FICHAS)) {
            $modifiedColumns[':p' . $index++]  = 'num_fichas';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_MODULO)) {
            $modifiedColumns[':p' . $index++]  = 'id_modulo';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_EDIT_TAG)) {
            $modifiedColumns[':p' . $index++]  = 'edit_tag';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO ci_options (%s) VALUES (%s)',
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
                    case 'nombre':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case 'descripcion':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case 'id_setting':
                        $stmt->bindValue($identifier, $this->id_setting, PDO::PARAM_INT);
                        break;
                    case 'nivel':
                        $stmt->bindValue($identifier, $this->nivel, PDO::PARAM_STR);
                        break;
                    case 'precio':
                        $stmt->bindValue($identifier, $this->precio, PDO::PARAM_STR);
                        break;
                    case 'num_fichas':
                        $stmt->bindValue($identifier, $this->num_fichas, PDO::PARAM_INT);
                        break;
                    case 'id_modulo':
                        $stmt->bindValue($identifier, $this->id_modulo, PDO::PARAM_INT);
                        break;
                    case 'edit_tag':
                        $stmt->bindValue($identifier, $this->edit_tag, PDO::PARAM_STR);
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
        $pos = CiOptionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getNombre();
                break;
            case 2:
                return $this->getDescripcion();
                break;
            case 3:
                return $this->getIdSetting();
                break;
            case 4:
                return $this->getNivel();
                break;
            case 5:
                return $this->getPrecio();
                break;
            case 6:
                return $this->getNumFichas();
                break;
            case 7:
                return $this->getIdModulo();
                break;
            case 8:
                return $this->getEditTag();
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

        if (isset($alreadyDumpedObjects['CiOptions'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CiOptions'][$this->hashCode()] = true;
        $keys = CiOptionsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdOption(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getDescripcion(),
            $keys[3] => $this->getIdSetting(),
            $keys[4] => $this->getNivel(),
            $keys[5] => $this->getPrecio(),
            $keys[6] => $this->getNumFichas(),
            $keys[7] => $this->getIdModulo(),
            $keys[8] => $this->getEditTag(),
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
            if (null !== $this->aCiSettings) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ciSettings';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ci_settings';
                        break;
                    default:
                        $key = 'CiSettings';
                }

                $result[$key] = $this->aCiSettings->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCiModulossRelatedByIdOpcionModulo) {

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

                $result[$key] = $this->collCiModulossRelatedByIdOpcionModulo->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiModulossRelatedByIdOpcionRoles) {

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

                $result[$key] = $this->collCiModulossRelatedByIdOpcionRoles->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collCiUsuariossRelatedByIdOpcionRole) {

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

                $result[$key] = $this->collCiUsuariossRelatedByIdOpcionRole->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCiUsuariossRelatedByIdTipoUsuario) {

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

                $result[$key] = $this->collCiUsuariossRelatedByIdTipoUsuario->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collHbfTurnoss) {

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

                $result[$key] = $this->collHbfTurnoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\CiOptions
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CiOptionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CiOptions
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdOption($value);
                break;
            case 1:
                $this->setNombre($value);
                break;
            case 2:
                $this->setDescripcion($value);
                break;
            case 3:
                $this->setIdSetting($value);
                break;
            case 4:
                $this->setNivel($value);
                break;
            case 5:
                $this->setPrecio($value);
                break;
            case 6:
                $this->setNumFichas($value);
                break;
            case 7:
                $this->setIdModulo($value);
                break;
            case 8:
                $this->setEditTag($value);
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
        $keys = CiOptionsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdOption($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNombre($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDescripcion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdSetting($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNivel($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPrecio($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setNumFichas($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setIdModulo($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setEditTag($arr[$keys[8]]);
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
     * @return $this|\CiOptions The current object, for fluid interface
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
        $criteria = new Criteria(CiOptionsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_OPTION)) {
            $criteria->add(CiOptionsTableMap::COL_ID_OPTION, $this->id_option);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_NOMBRE)) {
            $criteria->add(CiOptionsTableMap::COL_NOMBRE, $this->nombre);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_DESCRIPCION)) {
            $criteria->add(CiOptionsTableMap::COL_DESCRIPCION, $this->descripcion);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_SETTING)) {
            $criteria->add(CiOptionsTableMap::COL_ID_SETTING, $this->id_setting);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_NIVEL)) {
            $criteria->add(CiOptionsTableMap::COL_NIVEL, $this->nivel);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_PRECIO)) {
            $criteria->add(CiOptionsTableMap::COL_PRECIO, $this->precio);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_NUM_FICHAS)) {
            $criteria->add(CiOptionsTableMap::COL_NUM_FICHAS, $this->num_fichas);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_MODULO)) {
            $criteria->add(CiOptionsTableMap::COL_ID_MODULO, $this->id_modulo);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_EDIT_TAG)) {
            $criteria->add(CiOptionsTableMap::COL_EDIT_TAG, $this->edit_tag);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ESTADO)) {
            $criteria->add(CiOptionsTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(CiOptionsTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(CiOptionsTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(CiOptionsTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(CiOptionsTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(CiOptionsTableMap::COL_DATE_CREATED)) {
            $criteria->add(CiOptionsTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildCiOptionsQuery::create();
        $criteria->add(CiOptionsTableMap::COL_ID_OPTION, $this->id_option);

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
     * @param      object $copyObj An object of \CiOptions (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setIdSetting($this->getIdSetting());
        $copyObj->setNivel($this->getNivel());
        $copyObj->setPrecio($this->getPrecio());
        $copyObj->setNumFichas($this->getNumFichas());
        $copyObj->setIdModulo($this->getIdModulo());
        $copyObj->setEditTag($this->getEditTag());
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

            foreach ($this->getCiModulossRelatedByIdOpcionModulo() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiModulosRelatedByIdOpcionModulo($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiModulossRelatedByIdOpcionRoles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiModulosRelatedByIdOpcionRoles($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdOptionTipoAsociado() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdOptionTipoAsociado($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdOptionNivelAsociado() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdOptionNivelAsociado($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdOpcionRole() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdOpcionRole($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCiUsuariossRelatedByIdTipoUsuario() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCiUsuariosRelatedByIdTipoUsuario($relObj->copy($deepCopy));
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

            foreach ($this->getHbfSesioness() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfSesiones($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfTurnoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfTurnos($relObj->copy($deepCopy));
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
     * @return \CiOptions Clone of current object.
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
     * @return $this|\CiOptions The current object (for fluent API support)
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
            $v->addCiOptionsRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addCiOptionssRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\CiOptions The current object (for fluent API support)
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
            $v->addCiOptionsRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addCiOptionssRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildCiSettings object.
     *
     * @param  ChildCiSettings $v
     * @return $this|\CiOptions The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiSettings(ChildCiSettings $v = null)
    {
        if ($v === null) {
            $this->setIdSetting(NULL);
        } else {
            $this->setIdSetting($v->getIdSetting());
        }

        $this->aCiSettings = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiSettings object, it will not be re-added.
        if ($v !== null) {
            $v->addCiOptions($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCiSettings object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCiSettings The associated ChildCiSettings object.
     * @throws PropelException
     */
    public function getCiSettings(ConnectionInterface $con = null)
    {
        if ($this->aCiSettings === null && ($this->id_setting != 0)) {
            $this->aCiSettings = ChildCiSettingsQuery::create()->findPk($this->id_setting, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiSettings->addCiOptionss($this);
             */
        }

        return $this->aCiSettings;
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
        if ('CiModulosRelatedByIdOpcionModulo' == $relationName) {
            $this->initCiModulossRelatedByIdOpcionModulo();
            return;
        }
        if ('CiModulosRelatedByIdOpcionRoles' == $relationName) {
            $this->initCiModulossRelatedByIdOpcionRoles();
            return;
        }
        if ('CiUsuariosRelatedByIdOptionTipoAsociado' == $relationName) {
            $this->initCiUsuariossRelatedByIdOptionTipoAsociado();
            return;
        }
        if ('CiUsuariosRelatedByIdOptionNivelAsociado' == $relationName) {
            $this->initCiUsuariossRelatedByIdOptionNivelAsociado();
            return;
        }
        if ('CiUsuariosRelatedByIdOpcionRole' == $relationName) {
            $this->initCiUsuariossRelatedByIdOpcionRole();
            return;
        }
        if ('CiUsuariosRelatedByIdTipoUsuario' == $relationName) {
            $this->initCiUsuariossRelatedByIdTipoUsuario();
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
        if ('HbfSesiones' == $relationName) {
            $this->initHbfSesioness();
            return;
        }
        if ('HbfTurnos' == $relationName) {
            $this->initHbfTurnoss();
            return;
        }
        if ('HbfVasos' == $relationName) {
            $this->initHbfVasoss();
            return;
        }
    }

    /**
     * Clears out the collCiModulossRelatedByIdOpcionModulo collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiModulossRelatedByIdOpcionModulo()
     */
    public function clearCiModulossRelatedByIdOpcionModulo()
    {
        $this->collCiModulossRelatedByIdOpcionModulo = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiModulossRelatedByIdOpcionModulo collection loaded partially.
     */
    public function resetPartialCiModulossRelatedByIdOpcionModulo($v = true)
    {
        $this->collCiModulossRelatedByIdOpcionModuloPartial = $v;
    }

    /**
     * Initializes the collCiModulossRelatedByIdOpcionModulo collection.
     *
     * By default this just sets the collCiModulossRelatedByIdOpcionModulo collection to an empty array (like clearcollCiModulossRelatedByIdOpcionModulo());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiModulossRelatedByIdOpcionModulo($overrideExisting = true)
    {
        if (null !== $this->collCiModulossRelatedByIdOpcionModulo && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiModulosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiModulossRelatedByIdOpcionModulo = new $collectionClassName;
        $this->collCiModulossRelatedByIdOpcionModulo->setModel('\CiModulos');
    }

    /**
     * Gets an array of ChildCiModulos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiOptions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     * @throws PropelException
     */
    public function getCiModulossRelatedByIdOpcionModulo(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdOpcionModuloPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdOpcionModulo || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdOpcionModulo) {
                // return empty collection
                $this->initCiModulossRelatedByIdOpcionModulo();
            } else {
                $collCiModulossRelatedByIdOpcionModulo = ChildCiModulosQuery::create(null, $criteria)
                    ->filterByCiOptionsRelatedByIdOpcionModulo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiModulossRelatedByIdOpcionModuloPartial && count($collCiModulossRelatedByIdOpcionModulo)) {
                        $this->initCiModulossRelatedByIdOpcionModulo(false);

                        foreach ($collCiModulossRelatedByIdOpcionModulo as $obj) {
                            if (false == $this->collCiModulossRelatedByIdOpcionModulo->contains($obj)) {
                                $this->collCiModulossRelatedByIdOpcionModulo->append($obj);
                            }
                        }

                        $this->collCiModulossRelatedByIdOpcionModuloPartial = true;
                    }

                    return $collCiModulossRelatedByIdOpcionModulo;
                }

                if ($partial && $this->collCiModulossRelatedByIdOpcionModulo) {
                    foreach ($this->collCiModulossRelatedByIdOpcionModulo as $obj) {
                        if ($obj->isNew()) {
                            $collCiModulossRelatedByIdOpcionModulo[] = $obj;
                        }
                    }
                }

                $this->collCiModulossRelatedByIdOpcionModulo = $collCiModulossRelatedByIdOpcionModulo;
                $this->collCiModulossRelatedByIdOpcionModuloPartial = false;
            }
        }

        return $this->collCiModulossRelatedByIdOpcionModulo;
    }

    /**
     * Sets a collection of ChildCiModulos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciModulossRelatedByIdOpcionModulo A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setCiModulossRelatedByIdOpcionModulo(Collection $ciModulossRelatedByIdOpcionModulo, ConnectionInterface $con = null)
    {
        /** @var ChildCiModulos[] $ciModulossRelatedByIdOpcionModuloToDelete */
        $ciModulossRelatedByIdOpcionModuloToDelete = $this->getCiModulossRelatedByIdOpcionModulo(new Criteria(), $con)->diff($ciModulossRelatedByIdOpcionModulo);


        $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion = $ciModulossRelatedByIdOpcionModuloToDelete;

        foreach ($ciModulossRelatedByIdOpcionModuloToDelete as $ciModulosRelatedByIdOpcionModuloRemoved) {
            $ciModulosRelatedByIdOpcionModuloRemoved->setCiOptionsRelatedByIdOpcionModulo(null);
        }

        $this->collCiModulossRelatedByIdOpcionModulo = null;
        foreach ($ciModulossRelatedByIdOpcionModulo as $ciModulosRelatedByIdOpcionModulo) {
            $this->addCiModulosRelatedByIdOpcionModulo($ciModulosRelatedByIdOpcionModulo);
        }

        $this->collCiModulossRelatedByIdOpcionModulo = $ciModulossRelatedByIdOpcionModulo;
        $this->collCiModulossRelatedByIdOpcionModuloPartial = false;

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
    public function countCiModulossRelatedByIdOpcionModulo(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdOpcionModuloPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdOpcionModulo || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdOpcionModulo) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiModulossRelatedByIdOpcionModulo());
            }

            $query = ChildCiModulosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiOptionsRelatedByIdOpcionModulo($this)
                ->count($con);
        }

        return count($this->collCiModulossRelatedByIdOpcionModulo);
    }

    /**
     * Method called to associate a ChildCiModulos object to this object
     * through the ChildCiModulos foreign key attribute.
     *
     * @param  ChildCiModulos $l ChildCiModulos
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function addCiModulosRelatedByIdOpcionModulo(ChildCiModulos $l)
    {
        if ($this->collCiModulossRelatedByIdOpcionModulo === null) {
            $this->initCiModulossRelatedByIdOpcionModulo();
            $this->collCiModulossRelatedByIdOpcionModuloPartial = true;
        }

        if (!$this->collCiModulossRelatedByIdOpcionModulo->contains($l)) {
            $this->doAddCiModulosRelatedByIdOpcionModulo($l);

            if ($this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion and $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion->contains($l)) {
                $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion->remove($this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiModulos $ciModulosRelatedByIdOpcionModulo The ChildCiModulos object to add.
     */
    protected function doAddCiModulosRelatedByIdOpcionModulo(ChildCiModulos $ciModulosRelatedByIdOpcionModulo)
    {
        $this->collCiModulossRelatedByIdOpcionModulo[]= $ciModulosRelatedByIdOpcionModulo;
        $ciModulosRelatedByIdOpcionModulo->setCiOptionsRelatedByIdOpcionModulo($this);
    }

    /**
     * @param  ChildCiModulos $ciModulosRelatedByIdOpcionModulo The ChildCiModulos object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function removeCiModulosRelatedByIdOpcionModulo(ChildCiModulos $ciModulosRelatedByIdOpcionModulo)
    {
        if ($this->getCiModulossRelatedByIdOpcionModulo()->contains($ciModulosRelatedByIdOpcionModulo)) {
            $pos = $this->collCiModulossRelatedByIdOpcionModulo->search($ciModulosRelatedByIdOpcionModulo);
            $this->collCiModulossRelatedByIdOpcionModulo->remove($pos);
            if (null === $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion) {
                $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion = clone $this->collCiModulossRelatedByIdOpcionModulo;
                $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion->clear();
            }
            $this->ciModulossRelatedByIdOpcionModuloScheduledForDeletion[]= $ciModulosRelatedByIdOpcionModulo;
            $ciModulosRelatedByIdOpcionModulo->setCiOptionsRelatedByIdOpcionModulo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiModulossRelatedByIdOpcionModulo from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdOpcionModuloJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getCiModulossRelatedByIdOpcionModulo($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiModulossRelatedByIdOpcionModulo from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdOpcionModuloJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getCiModulossRelatedByIdOpcionModulo($query, $con);
    }

    /**
     * Clears out the collCiModulossRelatedByIdOpcionRoles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiModulossRelatedByIdOpcionRoles()
     */
    public function clearCiModulossRelatedByIdOpcionRoles()
    {
        $this->collCiModulossRelatedByIdOpcionRoles = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiModulossRelatedByIdOpcionRoles collection loaded partially.
     */
    public function resetPartialCiModulossRelatedByIdOpcionRoles($v = true)
    {
        $this->collCiModulossRelatedByIdOpcionRolesPartial = $v;
    }

    /**
     * Initializes the collCiModulossRelatedByIdOpcionRoles collection.
     *
     * By default this just sets the collCiModulossRelatedByIdOpcionRoles collection to an empty array (like clearcollCiModulossRelatedByIdOpcionRoles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiModulossRelatedByIdOpcionRoles($overrideExisting = true)
    {
        if (null !== $this->collCiModulossRelatedByIdOpcionRoles && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiModulosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiModulossRelatedByIdOpcionRoles = new $collectionClassName;
        $this->collCiModulossRelatedByIdOpcionRoles->setModel('\CiModulos');
    }

    /**
     * Gets an array of ChildCiModulos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiOptions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     * @throws PropelException
     */
    public function getCiModulossRelatedByIdOpcionRoles(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdOpcionRolesPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdOpcionRoles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdOpcionRoles) {
                // return empty collection
                $this->initCiModulossRelatedByIdOpcionRoles();
            } else {
                $collCiModulossRelatedByIdOpcionRoles = ChildCiModulosQuery::create(null, $criteria)
                    ->filterByCiOptionsRelatedByIdOpcionRoles($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiModulossRelatedByIdOpcionRolesPartial && count($collCiModulossRelatedByIdOpcionRoles)) {
                        $this->initCiModulossRelatedByIdOpcionRoles(false);

                        foreach ($collCiModulossRelatedByIdOpcionRoles as $obj) {
                            if (false == $this->collCiModulossRelatedByIdOpcionRoles->contains($obj)) {
                                $this->collCiModulossRelatedByIdOpcionRoles->append($obj);
                            }
                        }

                        $this->collCiModulossRelatedByIdOpcionRolesPartial = true;
                    }

                    return $collCiModulossRelatedByIdOpcionRoles;
                }

                if ($partial && $this->collCiModulossRelatedByIdOpcionRoles) {
                    foreach ($this->collCiModulossRelatedByIdOpcionRoles as $obj) {
                        if ($obj->isNew()) {
                            $collCiModulossRelatedByIdOpcionRoles[] = $obj;
                        }
                    }
                }

                $this->collCiModulossRelatedByIdOpcionRoles = $collCiModulossRelatedByIdOpcionRoles;
                $this->collCiModulossRelatedByIdOpcionRolesPartial = false;
            }
        }

        return $this->collCiModulossRelatedByIdOpcionRoles;
    }

    /**
     * Sets a collection of ChildCiModulos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciModulossRelatedByIdOpcionRoles A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setCiModulossRelatedByIdOpcionRoles(Collection $ciModulossRelatedByIdOpcionRoles, ConnectionInterface $con = null)
    {
        /** @var ChildCiModulos[] $ciModulossRelatedByIdOpcionRolesToDelete */
        $ciModulossRelatedByIdOpcionRolesToDelete = $this->getCiModulossRelatedByIdOpcionRoles(new Criteria(), $con)->diff($ciModulossRelatedByIdOpcionRoles);


        $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion = $ciModulossRelatedByIdOpcionRolesToDelete;

        foreach ($ciModulossRelatedByIdOpcionRolesToDelete as $ciModulosRelatedByIdOpcionRolesRemoved) {
            $ciModulosRelatedByIdOpcionRolesRemoved->setCiOptionsRelatedByIdOpcionRoles(null);
        }

        $this->collCiModulossRelatedByIdOpcionRoles = null;
        foreach ($ciModulossRelatedByIdOpcionRoles as $ciModulosRelatedByIdOpcionRoles) {
            $this->addCiModulosRelatedByIdOpcionRoles($ciModulosRelatedByIdOpcionRoles);
        }

        $this->collCiModulossRelatedByIdOpcionRoles = $ciModulossRelatedByIdOpcionRoles;
        $this->collCiModulossRelatedByIdOpcionRolesPartial = false;

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
    public function countCiModulossRelatedByIdOpcionRoles(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiModulossRelatedByIdOpcionRolesPartial && !$this->isNew();
        if (null === $this->collCiModulossRelatedByIdOpcionRoles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiModulossRelatedByIdOpcionRoles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiModulossRelatedByIdOpcionRoles());
            }

            $query = ChildCiModulosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiOptionsRelatedByIdOpcionRoles($this)
                ->count($con);
        }

        return count($this->collCiModulossRelatedByIdOpcionRoles);
    }

    /**
     * Method called to associate a ChildCiModulos object to this object
     * through the ChildCiModulos foreign key attribute.
     *
     * @param  ChildCiModulos $l ChildCiModulos
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function addCiModulosRelatedByIdOpcionRoles(ChildCiModulos $l)
    {
        if ($this->collCiModulossRelatedByIdOpcionRoles === null) {
            $this->initCiModulossRelatedByIdOpcionRoles();
            $this->collCiModulossRelatedByIdOpcionRolesPartial = true;
        }

        if (!$this->collCiModulossRelatedByIdOpcionRoles->contains($l)) {
            $this->doAddCiModulosRelatedByIdOpcionRoles($l);

            if ($this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion and $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion->contains($l)) {
                $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion->remove($this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiModulos $ciModulosRelatedByIdOpcionRoles The ChildCiModulos object to add.
     */
    protected function doAddCiModulosRelatedByIdOpcionRoles(ChildCiModulos $ciModulosRelatedByIdOpcionRoles)
    {
        $this->collCiModulossRelatedByIdOpcionRoles[]= $ciModulosRelatedByIdOpcionRoles;
        $ciModulosRelatedByIdOpcionRoles->setCiOptionsRelatedByIdOpcionRoles($this);
    }

    /**
     * @param  ChildCiModulos $ciModulosRelatedByIdOpcionRoles The ChildCiModulos object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function removeCiModulosRelatedByIdOpcionRoles(ChildCiModulos $ciModulosRelatedByIdOpcionRoles)
    {
        if ($this->getCiModulossRelatedByIdOpcionRoles()->contains($ciModulosRelatedByIdOpcionRoles)) {
            $pos = $this->collCiModulossRelatedByIdOpcionRoles->search($ciModulosRelatedByIdOpcionRoles);
            $this->collCiModulossRelatedByIdOpcionRoles->remove($pos);
            if (null === $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion) {
                $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion = clone $this->collCiModulossRelatedByIdOpcionRoles;
                $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion->clear();
            }
            $this->ciModulossRelatedByIdOpcionRolesScheduledForDeletion[]= $ciModulosRelatedByIdOpcionRoles;
            $ciModulosRelatedByIdOpcionRoles->setCiOptionsRelatedByIdOpcionRoles(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiModulossRelatedByIdOpcionRoles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdOpcionRolesJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getCiModulossRelatedByIdOpcionRoles($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiModulossRelatedByIdOpcionRoles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiModulos[] List of ChildCiModulos objects
     */
    public function getCiModulossRelatedByIdOpcionRolesJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiModulosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getCiModulossRelatedByIdOpcionRoles($query, $con);
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
     * If this ChildCiOptions is new, it will return
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
                    ->filterByCiOptionsRelatedByIdOptionTipoAsociado($this)
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
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdOptionTipoAsociado(Collection $ciUsuariossRelatedByIdOptionTipoAsociado, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdOptionTipoAsociadoToDelete */
        $ciUsuariossRelatedByIdOptionTipoAsociadoToDelete = $this->getCiUsuariossRelatedByIdOptionTipoAsociado(new Criteria(), $con)->diff($ciUsuariossRelatedByIdOptionTipoAsociado);


        $this->ciUsuariossRelatedByIdOptionTipoAsociadoScheduledForDeletion = $ciUsuariossRelatedByIdOptionTipoAsociadoToDelete;

        foreach ($ciUsuariossRelatedByIdOptionTipoAsociadoToDelete as $ciUsuariosRelatedByIdOptionTipoAsociadoRemoved) {
            $ciUsuariosRelatedByIdOptionTipoAsociadoRemoved->setCiOptionsRelatedByIdOptionTipoAsociado(null);
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
                ->filterByCiOptionsRelatedByIdOptionTipoAsociado($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdOptionTipoAsociado);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\CiOptions The current object (for fluent API support)
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
        $ciUsuariosRelatedByIdOptionTipoAsociado->setCiOptionsRelatedByIdOptionTipoAsociado($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdOptionTipoAsociado The ChildCiUsuarios object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
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
            $ciUsuariosRelatedByIdOptionTipoAsociado->setCiOptionsRelatedByIdOptionTipoAsociado(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionTipoAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionTipoAsociadoJoinHbfClubsRelatedByIdClub(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfClubsRelatedByIdClub', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionTipoAsociado($query, $con);
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
     * If this ChildCiOptions is new, it will return
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
                    ->filterByCiOptionsRelatedByIdOptionNivelAsociado($this)
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
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdOptionNivelAsociado(Collection $ciUsuariossRelatedByIdOptionNivelAsociado, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdOptionNivelAsociadoToDelete */
        $ciUsuariossRelatedByIdOptionNivelAsociadoToDelete = $this->getCiUsuariossRelatedByIdOptionNivelAsociado(new Criteria(), $con)->diff($ciUsuariossRelatedByIdOptionNivelAsociado);


        $this->ciUsuariossRelatedByIdOptionNivelAsociadoScheduledForDeletion = $ciUsuariossRelatedByIdOptionNivelAsociadoToDelete;

        foreach ($ciUsuariossRelatedByIdOptionNivelAsociadoToDelete as $ciUsuariosRelatedByIdOptionNivelAsociadoRemoved) {
            $ciUsuariosRelatedByIdOptionNivelAsociadoRemoved->setCiOptionsRelatedByIdOptionNivelAsociado(null);
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
                ->filterByCiOptionsRelatedByIdOptionNivelAsociado($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdOptionNivelAsociado);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\CiOptions The current object (for fluent API support)
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
        $ciUsuariosRelatedByIdOptionNivelAsociado->setCiOptionsRelatedByIdOptionNivelAsociado($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdOptionNivelAsociado The ChildCiUsuarios object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
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
            $ciUsuariosRelatedByIdOptionNivelAsociado->setCiOptionsRelatedByIdOptionNivelAsociado(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionNivelAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionNivelAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionNivelAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOptionNivelAsociado from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOptionNivelAsociadoJoinHbfClubsRelatedByIdClub(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfClubsRelatedByIdClub', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOptionNivelAsociado($query, $con);
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdOpcionRole collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdOpcionRole()
     */
    public function clearCiUsuariossRelatedByIdOpcionRole()
    {
        $this->collCiUsuariossRelatedByIdOpcionRole = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdOpcionRole collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdOpcionRole($v = true)
    {
        $this->collCiUsuariossRelatedByIdOpcionRolePartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdOpcionRole collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdOpcionRole collection to an empty array (like clearcollCiUsuariossRelatedByIdOpcionRole());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdOpcionRole($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdOpcionRole && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdOpcionRole = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdOpcionRole->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiOptions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdOpcionRole(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOpcionRolePartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOpcionRole || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOpcionRole) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdOpcionRole();
            } else {
                $collCiUsuariossRelatedByIdOpcionRole = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByCiOptionsRelatedByIdOpcionRole($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdOpcionRolePartial && count($collCiUsuariossRelatedByIdOpcionRole)) {
                        $this->initCiUsuariossRelatedByIdOpcionRole(false);

                        foreach ($collCiUsuariossRelatedByIdOpcionRole as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdOpcionRole->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdOpcionRole->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdOpcionRolePartial = true;
                    }

                    return $collCiUsuariossRelatedByIdOpcionRole;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdOpcionRole) {
                    foreach ($this->collCiUsuariossRelatedByIdOpcionRole as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdOpcionRole[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdOpcionRole = $collCiUsuariossRelatedByIdOpcionRole;
                $this->collCiUsuariossRelatedByIdOpcionRolePartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdOpcionRole;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdOpcionRole A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdOpcionRole(Collection $ciUsuariossRelatedByIdOpcionRole, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdOpcionRoleToDelete */
        $ciUsuariossRelatedByIdOpcionRoleToDelete = $this->getCiUsuariossRelatedByIdOpcionRole(new Criteria(), $con)->diff($ciUsuariossRelatedByIdOpcionRole);


        $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion = $ciUsuariossRelatedByIdOpcionRoleToDelete;

        foreach ($ciUsuariossRelatedByIdOpcionRoleToDelete as $ciUsuariosRelatedByIdOpcionRoleRemoved) {
            $ciUsuariosRelatedByIdOpcionRoleRemoved->setCiOptionsRelatedByIdOpcionRole(null);
        }

        $this->collCiUsuariossRelatedByIdOpcionRole = null;
        foreach ($ciUsuariossRelatedByIdOpcionRole as $ciUsuariosRelatedByIdOpcionRole) {
            $this->addCiUsuariosRelatedByIdOpcionRole($ciUsuariosRelatedByIdOpcionRole);
        }

        $this->collCiUsuariossRelatedByIdOpcionRole = $ciUsuariossRelatedByIdOpcionRole;
        $this->collCiUsuariossRelatedByIdOpcionRolePartial = false;

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
    public function countCiUsuariossRelatedByIdOpcionRole(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdOpcionRolePartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdOpcionRole || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdOpcionRole) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdOpcionRole());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiOptionsRelatedByIdOpcionRole($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdOpcionRole);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdOpcionRole(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdOpcionRole === null) {
            $this->initCiUsuariossRelatedByIdOpcionRole();
            $this->collCiUsuariossRelatedByIdOpcionRolePartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdOpcionRole->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdOpcionRole($l);

            if ($this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion and $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion->remove($this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdOpcionRole The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdOpcionRole(ChildCiUsuarios $ciUsuariosRelatedByIdOpcionRole)
    {
        $this->collCiUsuariossRelatedByIdOpcionRole[]= $ciUsuariosRelatedByIdOpcionRole;
        $ciUsuariosRelatedByIdOpcionRole->setCiOptionsRelatedByIdOpcionRole($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdOpcionRole The ChildCiUsuarios object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdOpcionRole(ChildCiUsuarios $ciUsuariosRelatedByIdOpcionRole)
    {
        if ($this->getCiUsuariossRelatedByIdOpcionRole()->contains($ciUsuariosRelatedByIdOpcionRole)) {
            $pos = $this->collCiUsuariossRelatedByIdOpcionRole->search($ciUsuariosRelatedByIdOpcionRole);
            $this->collCiUsuariossRelatedByIdOpcionRole->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdOpcionRole;
                $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdOpcionRoleScheduledForDeletion[]= $ciUsuariosRelatedByIdOpcionRole;
            $ciUsuariosRelatedByIdOpcionRole->setCiOptionsRelatedByIdOpcionRole(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOpcionRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOpcionRoleJoinCiUsuariosRelatedByInvitadoPor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByInvitadoPor', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOpcionRole($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOpcionRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOpcionRoleJoinHbfTurnosRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnosRelatedByIdTurno', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOpcionRole($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOpcionRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOpcionRoleJoinHbfSesionesRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfSesionesRelatedByIdSesion', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOpcionRole($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdOpcionRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdOpcionRoleJoinHbfClubsRelatedByIdClub(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfClubsRelatedByIdClub', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdOpcionRole($query, $con);
    }

    /**
     * Clears out the collCiUsuariossRelatedByIdTipoUsuario collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCiUsuariossRelatedByIdTipoUsuario()
     */
    public function clearCiUsuariossRelatedByIdTipoUsuario()
    {
        $this->collCiUsuariossRelatedByIdTipoUsuario = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCiUsuariossRelatedByIdTipoUsuario collection loaded partially.
     */
    public function resetPartialCiUsuariossRelatedByIdTipoUsuario($v = true)
    {
        $this->collCiUsuariossRelatedByIdTipoUsuarioPartial = $v;
    }

    /**
     * Initializes the collCiUsuariossRelatedByIdTipoUsuario collection.
     *
     * By default this just sets the collCiUsuariossRelatedByIdTipoUsuario collection to an empty array (like clearcollCiUsuariossRelatedByIdTipoUsuario());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCiUsuariossRelatedByIdTipoUsuario($overrideExisting = true)
    {
        if (null !== $this->collCiUsuariossRelatedByIdTipoUsuario && !$overrideExisting) {
            return;
        }

        $collectionClassName = CiUsuariosTableMap::getTableMap()->getCollectionClassName();

        $this->collCiUsuariossRelatedByIdTipoUsuario = new $collectionClassName;
        $this->collCiUsuariossRelatedByIdTipoUsuario->setModel('\CiUsuarios');
    }

    /**
     * Gets an array of ChildCiUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiOptions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     * @throws PropelException
     */
    public function getCiUsuariossRelatedByIdTipoUsuario(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdTipoUsuarioPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdTipoUsuario || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdTipoUsuario) {
                // return empty collection
                $this->initCiUsuariossRelatedByIdTipoUsuario();
            } else {
                $collCiUsuariossRelatedByIdTipoUsuario = ChildCiUsuariosQuery::create(null, $criteria)
                    ->filterByCiOptionsRelatedByIdTipoUsuario($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCiUsuariossRelatedByIdTipoUsuarioPartial && count($collCiUsuariossRelatedByIdTipoUsuario)) {
                        $this->initCiUsuariossRelatedByIdTipoUsuario(false);

                        foreach ($collCiUsuariossRelatedByIdTipoUsuario as $obj) {
                            if (false == $this->collCiUsuariossRelatedByIdTipoUsuario->contains($obj)) {
                                $this->collCiUsuariossRelatedByIdTipoUsuario->append($obj);
                            }
                        }

                        $this->collCiUsuariossRelatedByIdTipoUsuarioPartial = true;
                    }

                    return $collCiUsuariossRelatedByIdTipoUsuario;
                }

                if ($partial && $this->collCiUsuariossRelatedByIdTipoUsuario) {
                    foreach ($this->collCiUsuariossRelatedByIdTipoUsuario as $obj) {
                        if ($obj->isNew()) {
                            $collCiUsuariossRelatedByIdTipoUsuario[] = $obj;
                        }
                    }
                }

                $this->collCiUsuariossRelatedByIdTipoUsuario = $collCiUsuariossRelatedByIdTipoUsuario;
                $this->collCiUsuariossRelatedByIdTipoUsuarioPartial = false;
            }
        }

        return $this->collCiUsuariossRelatedByIdTipoUsuario;
    }

    /**
     * Sets a collection of ChildCiUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $ciUsuariossRelatedByIdTipoUsuario A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setCiUsuariossRelatedByIdTipoUsuario(Collection $ciUsuariossRelatedByIdTipoUsuario, ConnectionInterface $con = null)
    {
        /** @var ChildCiUsuarios[] $ciUsuariossRelatedByIdTipoUsuarioToDelete */
        $ciUsuariossRelatedByIdTipoUsuarioToDelete = $this->getCiUsuariossRelatedByIdTipoUsuario(new Criteria(), $con)->diff($ciUsuariossRelatedByIdTipoUsuario);


        $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion = $ciUsuariossRelatedByIdTipoUsuarioToDelete;

        foreach ($ciUsuariossRelatedByIdTipoUsuarioToDelete as $ciUsuariosRelatedByIdTipoUsuarioRemoved) {
            $ciUsuariosRelatedByIdTipoUsuarioRemoved->setCiOptionsRelatedByIdTipoUsuario(null);
        }

        $this->collCiUsuariossRelatedByIdTipoUsuario = null;
        foreach ($ciUsuariossRelatedByIdTipoUsuario as $ciUsuariosRelatedByIdTipoUsuario) {
            $this->addCiUsuariosRelatedByIdTipoUsuario($ciUsuariosRelatedByIdTipoUsuario);
        }

        $this->collCiUsuariossRelatedByIdTipoUsuario = $ciUsuariossRelatedByIdTipoUsuario;
        $this->collCiUsuariossRelatedByIdTipoUsuarioPartial = false;

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
    public function countCiUsuariossRelatedByIdTipoUsuario(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCiUsuariossRelatedByIdTipoUsuarioPartial && !$this->isNew();
        if (null === $this->collCiUsuariossRelatedByIdTipoUsuario || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCiUsuariossRelatedByIdTipoUsuario) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCiUsuariossRelatedByIdTipoUsuario());
            }

            $query = ChildCiUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiOptionsRelatedByIdTipoUsuario($this)
                ->count($con);
        }

        return count($this->collCiUsuariossRelatedByIdTipoUsuario);
    }

    /**
     * Method called to associate a ChildCiUsuarios object to this object
     * through the ChildCiUsuarios foreign key attribute.
     *
     * @param  ChildCiUsuarios $l ChildCiUsuarios
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function addCiUsuariosRelatedByIdTipoUsuario(ChildCiUsuarios $l)
    {
        if ($this->collCiUsuariossRelatedByIdTipoUsuario === null) {
            $this->initCiUsuariossRelatedByIdTipoUsuario();
            $this->collCiUsuariossRelatedByIdTipoUsuarioPartial = true;
        }

        if (!$this->collCiUsuariossRelatedByIdTipoUsuario->contains($l)) {
            $this->doAddCiUsuariosRelatedByIdTipoUsuario($l);

            if ($this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion and $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion->contains($l)) {
                $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion->remove($this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCiUsuarios $ciUsuariosRelatedByIdTipoUsuario The ChildCiUsuarios object to add.
     */
    protected function doAddCiUsuariosRelatedByIdTipoUsuario(ChildCiUsuarios $ciUsuariosRelatedByIdTipoUsuario)
    {
        $this->collCiUsuariossRelatedByIdTipoUsuario[]= $ciUsuariosRelatedByIdTipoUsuario;
        $ciUsuariosRelatedByIdTipoUsuario->setCiOptionsRelatedByIdTipoUsuario($this);
    }

    /**
     * @param  ChildCiUsuarios $ciUsuariosRelatedByIdTipoUsuario The ChildCiUsuarios object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function removeCiUsuariosRelatedByIdTipoUsuario(ChildCiUsuarios $ciUsuariosRelatedByIdTipoUsuario)
    {
        if ($this->getCiUsuariossRelatedByIdTipoUsuario()->contains($ciUsuariosRelatedByIdTipoUsuario)) {
            $pos = $this->collCiUsuariossRelatedByIdTipoUsuario->search($ciUsuariosRelatedByIdTipoUsuario);
            $this->collCiUsuariossRelatedByIdTipoUsuario->remove($pos);
            if (null === $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion) {
                $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion = clone $this->collCiUsuariossRelatedByIdTipoUsuario;
                $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion->clear();
            }
            $this->ciUsuariossRelatedByIdTipoUsuarioScheduledForDeletion[]= $ciUsuariosRelatedByIdTipoUsuario;
            $ciUsuariosRelatedByIdTipoUsuario->setCiOptionsRelatedByIdTipoUsuario(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTipoUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTipoUsuarioJoinCiUsuariosRelatedByInvitadoPor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByInvitadoPor', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTipoUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTipoUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTipoUsuarioJoinHbfTurnosRelatedByIdTurno(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfTurnosRelatedByIdTurno', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTipoUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTipoUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTipoUsuarioJoinHbfSesionesRelatedByIdSesion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfSesionesRelatedByIdSesion', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTipoUsuario($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related CiUsuariossRelatedByIdTipoUsuario from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCiUsuarios[] List of ChildCiUsuarios objects
     */
    public function getCiUsuariossRelatedByIdTipoUsuarioJoinHbfClubsRelatedByIdClub(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCiUsuariosQuery::create(null, $criteria);
        $query->joinWith('HbfClubsRelatedByIdClub', $joinBehavior);

        return $this->getCiUsuariossRelatedByIdTipoUsuario($query, $con);
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
     * If this ChildCiOptions is new, it will return
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
                    ->filterByCiOptions($this)
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
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setHbfPrepagoss(Collection $hbfPrepagoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfPrepagos[] $hbfPrepagossToDelete */
        $hbfPrepagossToDelete = $this->getHbfPrepagoss(new Criteria(), $con)->diff($hbfPrepagoss);


        $this->hbfPrepagossScheduledForDeletion = $hbfPrepagossToDelete;

        foreach ($hbfPrepagossToDelete as $hbfPrepagosRemoved) {
            $hbfPrepagosRemoved->setCiOptions(null);
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
                ->filterByCiOptions($this)
                ->count($con);
        }

        return count($this->collHbfPrepagoss);
    }

    /**
     * Method called to associate a ChildHbfPrepagos object to this object
     * through the ChildHbfPrepagos foreign key attribute.
     *
     * @param  ChildHbfPrepagos $l ChildHbfPrepagos
     * @return $this|\CiOptions The current object (for fluent API support)
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
        $hbfPrepagos->setCiOptions($this);
    }

    /**
     * @param  ChildHbfPrepagos $hbfPrepagos The ChildHbfPrepagos object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
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
            $hbfPrepagos->setCiOptions(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfPrepagoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * If this ChildCiOptions is new, it will return
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
                    ->filterByCiOptionsRelatedByIdOptionCategoriaProducto($this)
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
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setHbfProductossRelatedByIdOptionCategoriaProducto(Collection $hbfProductossRelatedByIdOptionCategoriaProducto, ConnectionInterface $con = null)
    {
        /** @var ChildHbfProductos[] $hbfProductossRelatedByIdOptionCategoriaProductoToDelete */
        $hbfProductossRelatedByIdOptionCategoriaProductoToDelete = $this->getHbfProductossRelatedByIdOptionCategoriaProducto(new Criteria(), $con)->diff($hbfProductossRelatedByIdOptionCategoriaProducto);


        $this->hbfProductossRelatedByIdOptionCategoriaProductoScheduledForDeletion = $hbfProductossRelatedByIdOptionCategoriaProductoToDelete;

        foreach ($hbfProductossRelatedByIdOptionCategoriaProductoToDelete as $hbfProductosRelatedByIdOptionCategoriaProductoRemoved) {
            $hbfProductosRelatedByIdOptionCategoriaProductoRemoved->setCiOptionsRelatedByIdOptionCategoriaProducto(null);
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
                ->filterByCiOptionsRelatedByIdOptionCategoriaProducto($this)
                ->count($con);
        }

        return count($this->collHbfProductossRelatedByIdOptionCategoriaProducto);
    }

    /**
     * Method called to associate a ChildHbfProductos object to this object
     * through the ChildHbfProductos foreign key attribute.
     *
     * @param  ChildHbfProductos $l ChildHbfProductos
     * @return $this|\CiOptions The current object (for fluent API support)
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
        $hbfProductosRelatedByIdOptionCategoriaProducto->setCiOptionsRelatedByIdOptionCategoriaProducto($this);
    }

    /**
     * @param  ChildHbfProductos $hbfProductosRelatedByIdOptionCategoriaProducto The ChildHbfProductos object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
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
            $hbfProductosRelatedByIdOptionCategoriaProducto->setCiOptionsRelatedByIdOptionCategoriaProducto(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionCategoriaProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionCategoriaProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * If this ChildCiOptions is new, it will return
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
                    ->filterByCiOptionsRelatedByIdOptionTipoProducto($this)
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
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setHbfProductossRelatedByIdOptionTipoProducto(Collection $hbfProductossRelatedByIdOptionTipoProducto, ConnectionInterface $con = null)
    {
        /** @var ChildHbfProductos[] $hbfProductossRelatedByIdOptionTipoProductoToDelete */
        $hbfProductossRelatedByIdOptionTipoProductoToDelete = $this->getHbfProductossRelatedByIdOptionTipoProducto(new Criteria(), $con)->diff($hbfProductossRelatedByIdOptionTipoProducto);


        $this->hbfProductossRelatedByIdOptionTipoProductoScheduledForDeletion = $hbfProductossRelatedByIdOptionTipoProductoToDelete;

        foreach ($hbfProductossRelatedByIdOptionTipoProductoToDelete as $hbfProductosRelatedByIdOptionTipoProductoRemoved) {
            $hbfProductosRelatedByIdOptionTipoProductoRemoved->setCiOptionsRelatedByIdOptionTipoProducto(null);
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
                ->filterByCiOptionsRelatedByIdOptionTipoProducto($this)
                ->count($con);
        }

        return count($this->collHbfProductossRelatedByIdOptionTipoProducto);
    }

    /**
     * Method called to associate a ChildHbfProductos object to this object
     * through the ChildHbfProductos foreign key attribute.
     *
     * @param  ChildHbfProductos $l ChildHbfProductos
     * @return $this|\CiOptions The current object (for fluent API support)
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
        $hbfProductosRelatedByIdOptionTipoProducto->setCiOptionsRelatedByIdOptionTipoProducto($this);
    }

    /**
     * @param  ChildHbfProductos $hbfProductosRelatedByIdOptionTipoProducto The ChildHbfProductos object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
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
            $hbfProductosRelatedByIdOptionTipoProducto->setCiOptionsRelatedByIdOptionTipoProducto(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionTipoProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfProductossRelatedByIdOptionTipoProducto from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * If this ChildCiOptions is new, it will return
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
                    ->filterByCiOptions($this)
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
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setHbfSesioness(Collection $hbfSesioness, ConnectionInterface $con = null)
    {
        /** @var ChildHbfSesiones[] $hbfSesionessToDelete */
        $hbfSesionessToDelete = $this->getHbfSesioness(new Criteria(), $con)->diff($hbfSesioness);


        $this->hbfSesionessScheduledForDeletion = $hbfSesionessToDelete;

        foreach ($hbfSesionessToDelete as $hbfSesionesRemoved) {
            $hbfSesionesRemoved->setCiOptions(null);
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
                ->filterByCiOptions($this)
                ->count($con);
        }

        return count($this->collHbfSesioness);
    }

    /**
     * Method called to associate a ChildHbfSesiones object to this object
     * through the ChildHbfSesiones foreign key attribute.
     *
     * @param  ChildHbfSesiones $l ChildHbfSesiones
     * @return $this|\CiOptions The current object (for fluent API support)
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
        $hbfSesiones->setCiOptions($this);
    }

    /**
     * @param  ChildHbfSesiones $hbfSesiones The ChildHbfSesiones object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
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
            $this->hbfSesionessScheduledForDeletion[]= $hbfSesiones;
            $hbfSesiones->setCiOptions(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfSesioness from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfSesiones[] List of ChildHbfSesiones objects
     */
    public function getHbfSesionessJoinHbfTurnos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfSesionesQuery::create(null, $criteria);
        $query->joinWith('HbfTurnos', $joinBehavior);

        return $this->getHbfSesioness($query, $con);
    }

    /**
     * Clears out the collHbfTurnoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHbfTurnoss()
     */
    public function clearHbfTurnoss()
    {
        $this->collHbfTurnoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHbfTurnoss collection loaded partially.
     */
    public function resetPartialHbfTurnoss($v = true)
    {
        $this->collHbfTurnossPartial = $v;
    }

    /**
     * Initializes the collHbfTurnoss collection.
     *
     * By default this just sets the collHbfTurnoss collection to an empty array (like clearcollHbfTurnoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHbfTurnoss($overrideExisting = true)
    {
        if (null !== $this->collHbfTurnoss && !$overrideExisting) {
            return;
        }

        $collectionClassName = HbfTurnosTableMap::getTableMap()->getCollectionClassName();

        $this->collHbfTurnoss = new $collectionClassName;
        $this->collHbfTurnoss->setModel('\HbfTurnos');
    }

    /**
     * Gets an array of ChildHbfTurnos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCiOptions is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     * @throws PropelException
     */
    public function getHbfTurnoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossPartial && !$this->isNew();
        if (null === $this->collHbfTurnoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnoss) {
                // return empty collection
                $this->initHbfTurnoss();
            } else {
                $collHbfTurnoss = ChildHbfTurnosQuery::create(null, $criteria)
                    ->filterByCiOptions($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHbfTurnossPartial && count($collHbfTurnoss)) {
                        $this->initHbfTurnoss(false);

                        foreach ($collHbfTurnoss as $obj) {
                            if (false == $this->collHbfTurnoss->contains($obj)) {
                                $this->collHbfTurnoss->append($obj);
                            }
                        }

                        $this->collHbfTurnossPartial = true;
                    }

                    return $collHbfTurnoss;
                }

                if ($partial && $this->collHbfTurnoss) {
                    foreach ($this->collHbfTurnoss as $obj) {
                        if ($obj->isNew()) {
                            $collHbfTurnoss[] = $obj;
                        }
                    }
                }

                $this->collHbfTurnoss = $collHbfTurnoss;
                $this->collHbfTurnossPartial = false;
            }
        }

        return $this->collHbfTurnoss;
    }

    /**
     * Sets a collection of ChildHbfTurnos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hbfTurnoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setHbfTurnoss(Collection $hbfTurnoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfTurnos[] $hbfTurnossToDelete */
        $hbfTurnossToDelete = $this->getHbfTurnoss(new Criteria(), $con)->diff($hbfTurnoss);


        $this->hbfTurnossScheduledForDeletion = $hbfTurnossToDelete;

        foreach ($hbfTurnossToDelete as $hbfTurnosRemoved) {
            $hbfTurnosRemoved->setCiOptions(null);
        }

        $this->collHbfTurnoss = null;
        foreach ($hbfTurnoss as $hbfTurnos) {
            $this->addHbfTurnos($hbfTurnos);
        }

        $this->collHbfTurnoss = $hbfTurnoss;
        $this->collHbfTurnossPartial = false;

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
    public function countHbfTurnoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHbfTurnossPartial && !$this->isNew();
        if (null === $this->collHbfTurnoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHbfTurnoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHbfTurnoss());
            }

            $query = ChildHbfTurnosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCiOptions($this)
                ->count($con);
        }

        return count($this->collHbfTurnoss);
    }

    /**
     * Method called to associate a ChildHbfTurnos object to this object
     * through the ChildHbfTurnos foreign key attribute.
     *
     * @param  ChildHbfTurnos $l ChildHbfTurnos
     * @return $this|\CiOptions The current object (for fluent API support)
     */
    public function addHbfTurnos(ChildHbfTurnos $l)
    {
        if ($this->collHbfTurnoss === null) {
            $this->initHbfTurnoss();
            $this->collHbfTurnossPartial = true;
        }

        if (!$this->collHbfTurnoss->contains($l)) {
            $this->doAddHbfTurnos($l);

            if ($this->hbfTurnossScheduledForDeletion and $this->hbfTurnossScheduledForDeletion->contains($l)) {
                $this->hbfTurnossScheduledForDeletion->remove($this->hbfTurnossScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHbfTurnos $hbfTurnos The ChildHbfTurnos object to add.
     */
    protected function doAddHbfTurnos(ChildHbfTurnos $hbfTurnos)
    {
        $this->collHbfTurnoss[]= $hbfTurnos;
        $hbfTurnos->setCiOptions($this);
    }

    /**
     * @param  ChildHbfTurnos $hbfTurnos The ChildHbfTurnos object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function removeHbfTurnos(ChildHbfTurnos $hbfTurnos)
    {
        if ($this->getHbfTurnoss()->contains($hbfTurnos)) {
            $pos = $this->collHbfTurnoss->search($hbfTurnos);
            $this->collHbfTurnoss->remove($pos);
            if (null === $this->hbfTurnossScheduledForDeletion) {
                $this->hbfTurnossScheduledForDeletion = clone $this->collHbfTurnoss;
                $this->hbfTurnossScheduledForDeletion->clear();
            }
            $this->hbfTurnossScheduledForDeletion[]= $hbfTurnos;
            $hbfTurnos->setCiOptions(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfTurnoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossJoinCiUsuariosRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserCreated', $joinBehavior);

        return $this->getHbfTurnoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfTurnoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossJoinCiUsuariosRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdUserModified', $joinBehavior);

        return $this->getHbfTurnoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfTurnoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossJoinCiUsuariosRelatedByIdAsociado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('CiUsuariosRelatedByIdAsociado', $joinBehavior);

        return $this->getHbfTurnoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfTurnoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHbfTurnos[] List of ChildHbfTurnos objects
     */
    public function getHbfTurnossJoinHbfClubs(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHbfTurnosQuery::create(null, $criteria);
        $query->joinWith('HbfClubs', $joinBehavior);

        return $this->getHbfTurnoss($query, $con);
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
     * If this ChildCiOptions is new, it will return
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
                    ->filterByCiOptions($this)
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
     * @return $this|ChildCiOptions The current object (for fluent API support)
     */
    public function setHbfVasoss(Collection $hbfVasoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfVasos[] $hbfVasossToDelete */
        $hbfVasossToDelete = $this->getHbfVasoss(new Criteria(), $con)->diff($hbfVasoss);


        $this->hbfVasossScheduledForDeletion = $hbfVasossToDelete;

        foreach ($hbfVasossToDelete as $hbfVasosRemoved) {
            $hbfVasosRemoved->setCiOptions(null);
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
                ->filterByCiOptions($this)
                ->count($con);
        }

        return count($this->collHbfVasoss);
    }

    /**
     * Method called to associate a ChildHbfVasos object to this object
     * through the ChildHbfVasos foreign key attribute.
     *
     * @param  ChildHbfVasos $l ChildHbfVasos
     * @return $this|\CiOptions The current object (for fluent API support)
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
        $hbfVasos->setCiOptions($this);
    }

    /**
     * @param  ChildHbfVasos $hbfVasos The ChildHbfVasos object to remove.
     * @return $this|ChildCiOptions The current object (for fluent API support)
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
            $hbfVasos->setCiOptions(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
     * Otherwise if this CiOptions is new, it will return
     * an empty collection; or if this CiOptions has previously
     * been saved, it will retrieve related HbfVasoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CiOptions.
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
            $this->aCiUsuariosRelatedByIdUserCreated->removeCiOptionsRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeCiOptionsRelatedByIdUserModified($this);
        }
        if (null !== $this->aCiSettings) {
            $this->aCiSettings->removeCiOptions($this);
        }
        $this->id_option = null;
        $this->nombre = null;
        $this->descripcion = null;
        $this->id_setting = null;
        $this->nivel = null;
        $this->precio = null;
        $this->num_fichas = null;
        $this->id_modulo = null;
        $this->edit_tag = null;
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
            if ($this->collCiModulossRelatedByIdOpcionModulo) {
                foreach ($this->collCiModulossRelatedByIdOpcionModulo as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiModulossRelatedByIdOpcionRoles) {
                foreach ($this->collCiModulossRelatedByIdOpcionRoles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdOptionTipoAsociado) {
                foreach ($this->collCiUsuariossRelatedByIdOptionTipoAsociado as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdOptionNivelAsociado) {
                foreach ($this->collCiUsuariossRelatedByIdOptionNivelAsociado as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdOpcionRole) {
                foreach ($this->collCiUsuariossRelatedByIdOpcionRole as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCiUsuariossRelatedByIdTipoUsuario) {
                foreach ($this->collCiUsuariossRelatedByIdTipoUsuario as $o) {
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
            if ($this->collHbfSesioness) {
                foreach ($this->collHbfSesioness as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfTurnoss) {
                foreach ($this->collHbfTurnoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfVasoss) {
                foreach ($this->collHbfVasoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCiModulossRelatedByIdOpcionModulo = null;
        $this->collCiModulossRelatedByIdOpcionRoles = null;
        $this->collCiUsuariossRelatedByIdOptionTipoAsociado = null;
        $this->collCiUsuariossRelatedByIdOptionNivelAsociado = null;
        $this->collCiUsuariossRelatedByIdOpcionRole = null;
        $this->collCiUsuariossRelatedByIdTipoUsuario = null;
        $this->collHbfPrepagoss = null;
        $this->collHbfProductossRelatedByIdOptionCategoriaProducto = null;
        $this->collHbfProductossRelatedByIdOptionTipoProducto = null;
        $this->collHbfSesioness = null;
        $this->collHbfTurnoss = null;
        $this->collHbfVasoss = null;
        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
        $this->aCiSettings = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CiOptionsTableMap::DEFAULT_STRING_FORMAT);
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
