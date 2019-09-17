<?php

namespace Base;

use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \HbfComandas as ChildHbfComandas;
use \HbfComandasQuery as ChildHbfComandasQuery;
use \HbfIngresos as ChildHbfIngresos;
use \HbfIngresosQuery as ChildHbfIngresosQuery;
use \HbfPrepagos as ChildHbfPrepagos;
use \HbfPrepagosQuery as ChildHbfPrepagosQuery;
use \HbfSesiones as ChildHbfSesiones;
use \HbfSesionesQuery as ChildHbfSesionesQuery;
use \HbfTurnos as ChildHbfTurnos;
use \HbfTurnosQuery as ChildHbfTurnosQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\HbfComandasTableMap;
use Map\HbfIngresosTableMap;
use Map\HbfPrepagosTableMap;
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
 * Base class that represents a row from the 'hbf_prepagos' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class HbfPrepagos implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\HbfPrepagosTableMap';


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
     * The value for the id_prepago field.
     *
     * @var        int
     */
    protected $id_prepago;

    /**
     * The value for the id_cliente field.
     *
     * @var        int
     */
    protected $id_cliente;

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
     * The value for the fichas_total field.
     *
     * @var        int
     */
    protected $fichas_total;

    /**
     * The value for the fichas_usadas field.
     *
     * @var        int
     */
    protected $fichas_usadas;

    /**
     * The value for the fichas_gratis field.
     *
     * @var        int
     */
    protected $fichas_gratis;

    /**
     * The value for the fichas_restantes field.
     *
     * @var        int
     */
    protected $fichas_restantes;

    /**
     * The value for the id_option_tipo_prepago field.
     *
     * @var        int
     */
    protected $id_option_tipo_prepago;

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
     * The value for the importe field.
     *
     * @var        string
     */
    protected $importe;

    /**
     * The value for the pagado field.
     *
     * Note: this column has a database default value of: 'NO'
     * @var        string
     */
    protected $pagado;

    /**
     * The value for the finalizado field.
     *
     * Note: this column has a database default value of: 'NO'
     * @var        string
     */
    protected $finalizado;

    /**
     * The value for the observaciones field.
     *
     * @var        int
     */
    protected $observaciones;

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
     * The value for the id_user_created field.
     *
     * @var        int
     */
    protected $id_user_created;

    /**
     * The value for the id_user_modified field.
     *
     * @var        int
     */
    protected $id_user_modified;

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
    protected $aCiUsuariosRelatedByIdCliente;

    /**
     * @var        ChildCiUsuarios
     */
    protected $aCiUsuariosRelatedByIdUserCreated;

    /**
     * @var        ChildCiUsuarios
     */
    protected $aCiUsuariosRelatedByIdUserModified;

    /**
     * @var        ChildHbfSesiones
     */
    protected $aHbfSesiones;

    /**
     * @var        ChildCiOptions
     */
    protected $aCiOptions;

    /**
     * @var        ChildHbfTurnos
     */
    protected $aHbfTurnos;

    /**
     * @var        ObjectCollection|ChildHbfComandas[] Collection to store aggregation of ChildHbfComandas objects.
     */
    protected $collHbfComandass;
    protected $collHbfComandassPartial;

    /**
     * @var        ObjectCollection|ChildHbfIngresos[] Collection to store aggregation of ChildHbfIngresos objects.
     */
    protected $collHbfIngresoss;
    protected $collHbfIngresossPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfComandas[]
     */
    protected $hbfComandassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHbfIngresos[]
     */
    protected $hbfIngresossScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->pagado = 'NO';
        $this->finalizado = 'NO';
        $this->estado = 'ENABLED';
        $this->change_count = 0;
    }

    /**
     * Initializes internal state of Base\HbfPrepagos object.
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
     * Compares this with another <code>HbfPrepagos</code> instance.  If
     * <code>obj</code> is an instance of <code>HbfPrepagos</code>, delegates to
     * <code>equals(HbfPrepagos)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|HbfPrepagos The current object, for fluid interface
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
     * Get the [id_prepago] column value.
     *
     * @return int
     */
    public function getIdPrepago()
    {
        return $this->id_prepago;
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
     * Get the [fichas_total] column value.
     *
     * @return int
     */
    public function getFichasTotal()
    {
        return $this->fichas_total;
    }

    /**
     * Get the [fichas_usadas] column value.
     *
     * @return int
     */
    public function getFichasUsadas()
    {
        return $this->fichas_usadas;
    }

    /**
     * Get the [fichas_gratis] column value.
     *
     * @return int
     */
    public function getFichasGratis()
    {
        return $this->fichas_gratis;
    }

    /**
     * Get the [fichas_restantes] column value.
     *
     * @return int
     */
    public function getFichasRestantes()
    {
        return $this->fichas_restantes;
    }

    /**
     * Get the [id_option_tipo_prepago] column value.
     *
     * @return int
     */
    public function getIdOptionTipoPrepago()
    {
        return $this->id_option_tipo_prepago;
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
     * Get the [importe] column value.
     *
     * @return string
     */
    public function getImporte()
    {
        return $this->importe;
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
     * Get the [finalizado] column value.
     *
     * @return string
     */
    public function getFinalizado()
    {
        return $this->finalizado;
    }

    /**
     * Get the [observaciones] column value.
     *
     * @return int
     */
    public function getObservaciones()
    {
        return $this->observaciones;
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
     * Get the [id_user_created] column value.
     *
     * @return int
     */
    public function getIdUserCreated()
    {
        return $this->id_user_created;
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
     * Set the value of [id_prepago] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setIdPrepago($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_prepago !== $v) {
            $this->id_prepago = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_PREPAGO] = true;
        }

        return $this;
    } // setIdPrepago()

    /**
     * Set the value of [id_cliente] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setIdCliente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_cliente !== $v) {
            $this->id_cliente = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_CLIENTE] = true;
        }

        if ($this->aCiUsuariosRelatedByIdCliente !== null && $this->aCiUsuariosRelatedByIdCliente->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdCliente = null;
        }

        return $this;
    } // setIdCliente()

    /**
     * Set the value of [id_turno] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setIdTurno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_turno !== $v) {
            $this->id_turno = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_TURNO] = true;
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
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setIdSesion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sesion !== $v) {
            $this->id_sesion = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_SESION] = true;
        }

        if ($this->aHbfSesiones !== null && $this->aHbfSesiones->getIdSesion() !== $v) {
            $this->aHbfSesiones = null;
        }

        return $this;
    } // setIdSesion()

    /**
     * Set the value of [fichas_total] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setFichasTotal($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fichas_total !== $v) {
            $this->fichas_total = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_FICHAS_TOTAL] = true;
        }

        return $this;
    } // setFichasTotal()

    /**
     * Set the value of [fichas_usadas] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setFichasUsadas($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fichas_usadas !== $v) {
            $this->fichas_usadas = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_FICHAS_USADAS] = true;
        }

        return $this;
    } // setFichasUsadas()

    /**
     * Set the value of [fichas_gratis] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setFichasGratis($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fichas_gratis !== $v) {
            $this->fichas_gratis = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_FICHAS_GRATIS] = true;
        }

        return $this;
    } // setFichasGratis()

    /**
     * Set the value of [fichas_restantes] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setFichasRestantes($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fichas_restantes !== $v) {
            $this->fichas_restantes = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_FICHAS_RESTANTES] = true;
        }

        return $this;
    } // setFichasRestantes()

    /**
     * Set the value of [id_option_tipo_prepago] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setIdOptionTipoPrepago($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_option_tipo_prepago !== $v) {
            $this->id_option_tipo_prepago = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO] = true;
        }

        if ($this->aCiOptions !== null && $this->aCiOptions->getIdOption() !== $v) {
            $this->aCiOptions = null;
        }

        return $this;
    } // setIdOptionTipoPrepago()

    /**
     * Set the value of [a_cuenta] column.
     *
     * @param string $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setACuenta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->a_cuenta !== $v) {
            $this->a_cuenta = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_A_CUENTA] = true;
        }

        return $this;
    } // setACuenta()

    /**
     * Set the value of [saldo] column.
     *
     * @param string $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setSaldo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saldo !== $v) {
            $this->saldo = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_SALDO] = true;
        }

        return $this;
    } // setSaldo()

    /**
     * Set the value of [importe] column.
     *
     * @param string $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setImporte($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->importe !== $v) {
            $this->importe = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_IMPORTE] = true;
        }

        return $this;
    } // setImporte()

    /**
     * Set the value of [pagado] column.
     *
     * @param string $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setPagado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pagado !== $v) {
            $this->pagado = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_PAGADO] = true;
        }

        return $this;
    } // setPagado()

    /**
     * Set the value of [finalizado] column.
     *
     * @param string $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setFinalizado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->finalizado !== $v) {
            $this->finalizado = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_FINALIZADO] = true;
        }

        return $this;
    } // setFinalizado()

    /**
     * Set the value of [observaciones] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setObservaciones($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->observaciones !== $v) {
            $this->observaciones = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_OBSERVACIONES] = true;
        }

        return $this;
    } // setObservaciones()

    /**
     * Set the value of [estado] column.
     *
     * @param string $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ESTADO] = true;
        }

        return $this;
    } // setEstado()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_created] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_USER_CREATED] = true;
        }

        if ($this->aCiUsuariosRelatedByIdUserCreated !== null && $this->aCiUsuariosRelatedByIdUserCreated->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdUserCreated = null;
        }

        return $this;
    } // setIdUserCreated()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_USER_MODIFIED] = true;
        }

        if ($this->aCiUsuariosRelatedByIdUserModified !== null && $this->aCiUsuariosRelatedByIdUserModified->getIdUsuario() !== $v) {
            $this->aCiUsuariosRelatedByIdUserModified = null;
        }

        return $this;
    } // setIdUserModified()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfPrepagosTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[HbfPrepagosTableMap::COL_DATE_CREATED] = true;
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
            if ($this->pagado !== 'NO') {
                return false;
            }

            if ($this->finalizado !== 'NO') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : HbfPrepagosTableMap::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_prepago = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : HbfPrepagosTableMap::translateFieldName('IdCliente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_cliente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : HbfPrepagosTableMap::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_turno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : HbfPrepagosTableMap::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sesion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : HbfPrepagosTableMap::translateFieldName('FichasTotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fichas_total = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : HbfPrepagosTableMap::translateFieldName('FichasUsadas', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fichas_usadas = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : HbfPrepagosTableMap::translateFieldName('FichasGratis', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fichas_gratis = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : HbfPrepagosTableMap::translateFieldName('FichasRestantes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fichas_restantes = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : HbfPrepagosTableMap::translateFieldName('IdOptionTipoPrepago', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_option_tipo_prepago = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : HbfPrepagosTableMap::translateFieldName('ACuenta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->a_cuenta = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : HbfPrepagosTableMap::translateFieldName('Saldo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saldo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : HbfPrepagosTableMap::translateFieldName('Importe', TableMap::TYPE_PHPNAME, $indexType)];
            $this->importe = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : HbfPrepagosTableMap::translateFieldName('Pagado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pagado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : HbfPrepagosTableMap::translateFieldName('Finalizado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->finalizado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : HbfPrepagosTableMap::translateFieldName('Observaciones', TableMap::TYPE_PHPNAME, $indexType)];
            $this->observaciones = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : HbfPrepagosTableMap::translateFieldName('Estado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : HbfPrepagosTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : HbfPrepagosTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : HbfPrepagosTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : HbfPrepagosTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : HbfPrepagosTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = HbfPrepagosTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\HbfPrepagos'), 0, $e);
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
        if ($this->aCiUsuariosRelatedByIdCliente !== null && $this->id_cliente !== $this->aCiUsuariosRelatedByIdCliente->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdCliente = null;
        }
        if ($this->aHbfTurnos !== null && $this->id_turno !== $this->aHbfTurnos->getIdTurno()) {
            $this->aHbfTurnos = null;
        }
        if ($this->aHbfSesiones !== null && $this->id_sesion !== $this->aHbfSesiones->getIdSesion()) {
            $this->aHbfSesiones = null;
        }
        if ($this->aCiOptions !== null && $this->id_option_tipo_prepago !== $this->aCiOptions->getIdOption()) {
            $this->aCiOptions = null;
        }
        if ($this->aCiUsuariosRelatedByIdUserCreated !== null && $this->id_user_created !== $this->aCiUsuariosRelatedByIdUserCreated->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdUserCreated = null;
        }
        if ($this->aCiUsuariosRelatedByIdUserModified !== null && $this->id_user_modified !== $this->aCiUsuariosRelatedByIdUserModified->getIdUsuario()) {
            $this->aCiUsuariosRelatedByIdUserModified = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(HbfPrepagosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildHbfPrepagosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCiUsuariosRelatedByIdCliente = null;
            $this->aCiUsuariosRelatedByIdUserCreated = null;
            $this->aCiUsuariosRelatedByIdUserModified = null;
            $this->aHbfSesiones = null;
            $this->aCiOptions = null;
            $this->aHbfTurnos = null;
            $this->collHbfComandass = null;

            $this->collHbfIngresoss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see HbfPrepagos::setDeleted()
     * @see HbfPrepagos::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPrepagosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildHbfPrepagosQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPrepagosTableMap::DATABASE_NAME);
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
                HbfPrepagosTableMap::addInstanceToPool($this);
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

            if ($this->aCiUsuariosRelatedByIdCliente !== null) {
                if ($this->aCiUsuariosRelatedByIdCliente->isModified() || $this->aCiUsuariosRelatedByIdCliente->isNew()) {
                    $affectedRows += $this->aCiUsuariosRelatedByIdCliente->save($con);
                }
                $this->setCiUsuariosRelatedByIdCliente($this->aCiUsuariosRelatedByIdCliente);
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

            if ($this->aHbfSesiones !== null) {
                if ($this->aHbfSesiones->isModified() || $this->aHbfSesiones->isNew()) {
                    $affectedRows += $this->aHbfSesiones->save($con);
                }
                $this->setHbfSesiones($this->aHbfSesiones);
            }

            if ($this->aCiOptions !== null) {
                if ($this->aCiOptions->isModified() || $this->aCiOptions->isNew()) {
                    $affectedRows += $this->aCiOptions->save($con);
                }
                $this->setCiOptions($this->aCiOptions);
            }

            if ($this->aHbfTurnos !== null) {
                if ($this->aHbfTurnos->isModified() || $this->aHbfTurnos->isNew()) {
                    $affectedRows += $this->aHbfTurnos->save($con);
                }
                $this->setHbfTurnos($this->aHbfTurnos);
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

            if ($this->hbfComandassScheduledForDeletion !== null) {
                if (!$this->hbfComandassScheduledForDeletion->isEmpty()) {
                    foreach ($this->hbfComandassScheduledForDeletion as $hbfComandas) {
                        // need to save related object because we set the relation to null
                        $hbfComandas->save($con);
                    }
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

        $this->modifiedColumns[HbfPrepagosTableMap::COL_ID_PREPAGO] = true;
        if (null !== $this->id_prepago) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HbfPrepagosTableMap::COL_ID_PREPAGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_PREPAGO)) {
            $modifiedColumns[':p' . $index++]  = 'id_prepago';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_CLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'id_cliente';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_TURNO)) {
            $modifiedColumns[':p' . $index++]  = 'id_turno';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_SESION)) {
            $modifiedColumns[':p' . $index++]  = 'id_sesion';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'fichas_total';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_USADAS)) {
            $modifiedColumns[':p' . $index++]  = 'fichas_usadas';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_GRATIS)) {
            $modifiedColumns[':p' . $index++]  = 'fichas_gratis';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_RESTANTES)) {
            $modifiedColumns[':p' . $index++]  = 'fichas_restantes';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO)) {
            $modifiedColumns[':p' . $index++]  = 'id_option_tipo_prepago';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_A_CUENTA)) {
            $modifiedColumns[':p' . $index++]  = 'a_cuenta';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_SALDO)) {
            $modifiedColumns[':p' . $index++]  = 'saldo';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_IMPORTE)) {
            $modifiedColumns[':p' . $index++]  = 'importe';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_PAGADO)) {
            $modifiedColumns[':p' . $index++]  = 'pagado';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FINALIZADO)) {
            $modifiedColumns[':p' . $index++]  = 'finalizado';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_OBSERVACIONES)) {
            $modifiedColumns[':p' . $index++]  = 'observaciones';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'estado';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO hbf_prepagos (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_prepago':
                        $stmt->bindValue($identifier, $this->id_prepago, PDO::PARAM_INT);
                        break;
                    case 'id_cliente':
                        $stmt->bindValue($identifier, $this->id_cliente, PDO::PARAM_INT);
                        break;
                    case 'id_turno':
                        $stmt->bindValue($identifier, $this->id_turno, PDO::PARAM_INT);
                        break;
                    case 'id_sesion':
                        $stmt->bindValue($identifier, $this->id_sesion, PDO::PARAM_INT);
                        break;
                    case 'fichas_total':
                        $stmt->bindValue($identifier, $this->fichas_total, PDO::PARAM_INT);
                        break;
                    case 'fichas_usadas':
                        $stmt->bindValue($identifier, $this->fichas_usadas, PDO::PARAM_INT);
                        break;
                    case 'fichas_gratis':
                        $stmt->bindValue($identifier, $this->fichas_gratis, PDO::PARAM_INT);
                        break;
                    case 'fichas_restantes':
                        $stmt->bindValue($identifier, $this->fichas_restantes, PDO::PARAM_INT);
                        break;
                    case 'id_option_tipo_prepago':
                        $stmt->bindValue($identifier, $this->id_option_tipo_prepago, PDO::PARAM_INT);
                        break;
                    case 'a_cuenta':
                        $stmt->bindValue($identifier, $this->a_cuenta, PDO::PARAM_STR);
                        break;
                    case 'saldo':
                        $stmt->bindValue($identifier, $this->saldo, PDO::PARAM_STR);
                        break;
                    case 'importe':
                        $stmt->bindValue($identifier, $this->importe, PDO::PARAM_STR);
                        break;
                    case 'pagado':
                        $stmt->bindValue($identifier, $this->pagado, PDO::PARAM_STR);
                        break;
                    case 'finalizado':
                        $stmt->bindValue($identifier, $this->finalizado, PDO::PARAM_STR);
                        break;
                    case 'observaciones':
                        $stmt->bindValue($identifier, $this->observaciones, PDO::PARAM_INT);
                        break;
                    case 'estado':
                        $stmt->bindValue($identifier, $this->estado, PDO::PARAM_STR);
                        break;
                    case 'change_count':
                        $stmt->bindValue($identifier, $this->change_count, PDO::PARAM_INT);
                        break;
                    case 'id_user_created':
                        $stmt->bindValue($identifier, $this->id_user_created, PDO::PARAM_INT);
                        break;
                    case 'id_user_modified':
                        $stmt->bindValue($identifier, $this->id_user_modified, PDO::PARAM_INT);
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
        $this->setIdPrepago($pk);

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
        $pos = HbfPrepagosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdPrepago();
                break;
            case 1:
                return $this->getIdCliente();
                break;
            case 2:
                return $this->getIdTurno();
                break;
            case 3:
                return $this->getIdSesion();
                break;
            case 4:
                return $this->getFichasTotal();
                break;
            case 5:
                return $this->getFichasUsadas();
                break;
            case 6:
                return $this->getFichasGratis();
                break;
            case 7:
                return $this->getFichasRestantes();
                break;
            case 8:
                return $this->getIdOptionTipoPrepago();
                break;
            case 9:
                return $this->getACuenta();
                break;
            case 10:
                return $this->getSaldo();
                break;
            case 11:
                return $this->getImporte();
                break;
            case 12:
                return $this->getPagado();
                break;
            case 13:
                return $this->getFinalizado();
                break;
            case 14:
                return $this->getObservaciones();
                break;
            case 15:
                return $this->getEstado();
                break;
            case 16:
                return $this->getChangeCount();
                break;
            case 17:
                return $this->getIdUserCreated();
                break;
            case 18:
                return $this->getIdUserModified();
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

        if (isset($alreadyDumpedObjects['HbfPrepagos'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['HbfPrepagos'][$this->hashCode()] = true;
        $keys = HbfPrepagosTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPrepago(),
            $keys[1] => $this->getIdCliente(),
            $keys[2] => $this->getIdTurno(),
            $keys[3] => $this->getIdSesion(),
            $keys[4] => $this->getFichasTotal(),
            $keys[5] => $this->getFichasUsadas(),
            $keys[6] => $this->getFichasGratis(),
            $keys[7] => $this->getFichasRestantes(),
            $keys[8] => $this->getIdOptionTipoPrepago(),
            $keys[9] => $this->getACuenta(),
            $keys[10] => $this->getSaldo(),
            $keys[11] => $this->getImporte(),
            $keys[12] => $this->getPagado(),
            $keys[13] => $this->getFinalizado(),
            $keys[14] => $this->getObservaciones(),
            $keys[15] => $this->getEstado(),
            $keys[16] => $this->getChangeCount(),
            $keys[17] => $this->getIdUserCreated(),
            $keys[18] => $this->getIdUserModified(),
            $keys[19] => $this->getDateModified(),
            $keys[20] => $this->getDateCreated(),
        );
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
     * @return $this|\HbfPrepagos
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = HbfPrepagosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\HbfPrepagos
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdPrepago($value);
                break;
            case 1:
                $this->setIdCliente($value);
                break;
            case 2:
                $this->setIdTurno($value);
                break;
            case 3:
                $this->setIdSesion($value);
                break;
            case 4:
                $this->setFichasTotal($value);
                break;
            case 5:
                $this->setFichasUsadas($value);
                break;
            case 6:
                $this->setFichasGratis($value);
                break;
            case 7:
                $this->setFichasRestantes($value);
                break;
            case 8:
                $this->setIdOptionTipoPrepago($value);
                break;
            case 9:
                $this->setACuenta($value);
                break;
            case 10:
                $this->setSaldo($value);
                break;
            case 11:
                $this->setImporte($value);
                break;
            case 12:
                $this->setPagado($value);
                break;
            case 13:
                $this->setFinalizado($value);
                break;
            case 14:
                $this->setObservaciones($value);
                break;
            case 15:
                $this->setEstado($value);
                break;
            case 16:
                $this->setChangeCount($value);
                break;
            case 17:
                $this->setIdUserCreated($value);
                break;
            case 18:
                $this->setIdUserModified($value);
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
        $keys = HbfPrepagosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdPrepago($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdCliente($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdTurno($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdSesion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFichasTotal($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFichasUsadas($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFichasGratis($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setFichasRestantes($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIdOptionTipoPrepago($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setACuenta($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSaldo($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setImporte($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPagado($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setFinalizado($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setObservaciones($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setEstado($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setChangeCount($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setIdUserCreated($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setIdUserModified($arr[$keys[18]]);
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
     * @return $this|\HbfPrepagos The current object, for fluid interface
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
        $criteria = new Criteria(HbfPrepagosTableMap::DATABASE_NAME);

        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_PREPAGO)) {
            $criteria->add(HbfPrepagosTableMap::COL_ID_PREPAGO, $this->id_prepago);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_CLIENTE)) {
            $criteria->add(HbfPrepagosTableMap::COL_ID_CLIENTE, $this->id_cliente);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_TURNO)) {
            $criteria->add(HbfPrepagosTableMap::COL_ID_TURNO, $this->id_turno);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_SESION)) {
            $criteria->add(HbfPrepagosTableMap::COL_ID_SESION, $this->id_sesion);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_TOTAL)) {
            $criteria->add(HbfPrepagosTableMap::COL_FICHAS_TOTAL, $this->fichas_total);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_USADAS)) {
            $criteria->add(HbfPrepagosTableMap::COL_FICHAS_USADAS, $this->fichas_usadas);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_GRATIS)) {
            $criteria->add(HbfPrepagosTableMap::COL_FICHAS_GRATIS, $this->fichas_gratis);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FICHAS_RESTANTES)) {
            $criteria->add(HbfPrepagosTableMap::COL_FICHAS_RESTANTES, $this->fichas_restantes);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO)) {
            $criteria->add(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO, $this->id_option_tipo_prepago);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_A_CUENTA)) {
            $criteria->add(HbfPrepagosTableMap::COL_A_CUENTA, $this->a_cuenta);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_SALDO)) {
            $criteria->add(HbfPrepagosTableMap::COL_SALDO, $this->saldo);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_IMPORTE)) {
            $criteria->add(HbfPrepagosTableMap::COL_IMPORTE, $this->importe);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_PAGADO)) {
            $criteria->add(HbfPrepagosTableMap::COL_PAGADO, $this->pagado);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_FINALIZADO)) {
            $criteria->add(HbfPrepagosTableMap::COL_FINALIZADO, $this->finalizado);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_OBSERVACIONES)) {
            $criteria->add(HbfPrepagosTableMap::COL_OBSERVACIONES, $this->observaciones);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ESTADO)) {
            $criteria->add(HbfPrepagosTableMap::COL_ESTADO, $this->estado);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(HbfPrepagosTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(HbfPrepagosTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(HbfPrepagosTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(HbfPrepagosTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(HbfPrepagosTableMap::COL_DATE_CREATED)) {
            $criteria->add(HbfPrepagosTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildHbfPrepagosQuery::create();
        $criteria->add(HbfPrepagosTableMap::COL_ID_PREPAGO, $this->id_prepago);

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
        $validPk = null !== $this->getIdPrepago();

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
        return $this->getIdPrepago();
    }

    /**
     * Generic method to set the primary key (id_prepago column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPrepago($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdPrepago();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \HbfPrepagos (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdCliente($this->getIdCliente());
        $copyObj->setIdTurno($this->getIdTurno());
        $copyObj->setIdSesion($this->getIdSesion());
        $copyObj->setFichasTotal($this->getFichasTotal());
        $copyObj->setFichasUsadas($this->getFichasUsadas());
        $copyObj->setFichasGratis($this->getFichasGratis());
        $copyObj->setFichasRestantes($this->getFichasRestantes());
        $copyObj->setIdOptionTipoPrepago($this->getIdOptionTipoPrepago());
        $copyObj->setACuenta($this->getACuenta());
        $copyObj->setSaldo($this->getSaldo());
        $copyObj->setImporte($this->getImporte());
        $copyObj->setPagado($this->getPagado());
        $copyObj->setFinalizado($this->getFinalizado());
        $copyObj->setObservaciones($this->getObservaciones());
        $copyObj->setEstado($this->getEstado());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getHbfComandass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfComandas($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHbfIngresoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHbfIngresos($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPrepago(NULL); // this is a auto-increment column, so set to default value
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
     * @return \HbfPrepagos Clone of current object.
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
     * @return $this|\HbfPrepagos The current object (for fluent API support)
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
            $v->addHbfPrepagosRelatedByIdCliente($this);
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
                $this->aCiUsuariosRelatedByIdCliente->addHbfPrepagossRelatedByIdCliente($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdCliente;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfPrepagos The current object (for fluent API support)
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
            $v->addHbfPrepagosRelatedByIdUserCreated($this);
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
                $this->aCiUsuariosRelatedByIdUserCreated->addHbfPrepagossRelatedByIdUserCreated($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildCiUsuarios object.
     *
     * @param  ChildCiUsuarios $v
     * @return $this|\HbfPrepagos The current object (for fluent API support)
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
            $v->addHbfPrepagosRelatedByIdUserModified($this);
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
                $this->aCiUsuariosRelatedByIdUserModified->addHbfPrepagossRelatedByIdUserModified($this);
             */
        }

        return $this->aCiUsuariosRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildHbfSesiones object.
     *
     * @param  ChildHbfSesiones $v
     * @return $this|\HbfPrepagos The current object (for fluent API support)
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
            $v->addHbfPrepagos($this);
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
                $this->aHbfSesiones->addHbfPrepagoss($this);
             */
        }

        return $this->aHbfSesiones;
    }

    /**
     * Declares an association between this object and a ChildCiOptions object.
     *
     * @param  ChildCiOptions $v
     * @return $this|\HbfPrepagos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCiOptions(ChildCiOptions $v = null)
    {
        if ($v === null) {
            $this->setIdOptionTipoPrepago(NULL);
        } else {
            $this->setIdOptionTipoPrepago($v->getIdOption());
        }

        $this->aCiOptions = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCiOptions object, it will not be re-added.
        if ($v !== null) {
            $v->addHbfPrepagos($this);
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
        if ($this->aCiOptions === null && ($this->id_option_tipo_prepago != 0)) {
            $this->aCiOptions = ChildCiOptionsQuery::create()->findPk($this->id_option_tipo_prepago, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCiOptions->addHbfPrepagoss($this);
             */
        }

        return $this->aCiOptions;
    }

    /**
     * Declares an association between this object and a ChildHbfTurnos object.
     *
     * @param  ChildHbfTurnos $v
     * @return $this|\HbfPrepagos The current object (for fluent API support)
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
            $v->addHbfPrepagos($this);
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
                $this->aHbfTurnos->addHbfPrepagoss($this);
             */
        }

        return $this->aHbfTurnos;
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
        if ('HbfComandas' == $relationName) {
            $this->initHbfComandass();
            return;
        }
        if ('HbfIngresos' == $relationName) {
            $this->initHbfIngresoss();
            return;
        }
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
     * If this ChildHbfPrepagos is new, it will return
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
                    ->filterByHbfPrepagos($this)
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
     * @return $this|ChildHbfPrepagos The current object (for fluent API support)
     */
    public function setHbfComandass(Collection $hbfComandass, ConnectionInterface $con = null)
    {
        /** @var ChildHbfComandas[] $hbfComandassToDelete */
        $hbfComandassToDelete = $this->getHbfComandass(new Criteria(), $con)->diff($hbfComandass);


        $this->hbfComandassScheduledForDeletion = $hbfComandassToDelete;

        foreach ($hbfComandassToDelete as $hbfComandasRemoved) {
            $hbfComandasRemoved->setHbfPrepagos(null);
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
                ->filterByHbfPrepagos($this)
                ->count($con);
        }

        return count($this->collHbfComandass);
    }

    /**
     * Method called to associate a ChildHbfComandas object to this object
     * through the ChildHbfComandas foreign key attribute.
     *
     * @param  ChildHbfComandas $l ChildHbfComandas
     * @return $this|\HbfPrepagos The current object (for fluent API support)
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
        $hbfComandas->setHbfPrepagos($this);
    }

    /**
     * @param  ChildHbfComandas $hbfComandas The ChildHbfComandas object to remove.
     * @return $this|ChildHbfPrepagos The current object (for fluent API support)
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
            $this->hbfComandassScheduledForDeletion[]= $hbfComandas;
            $hbfComandas->setHbfPrepagos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfComandass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * If this ChildHbfPrepagos is new, it will return
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
                    ->filterByHbfPrepagos($this)
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
     * @return $this|ChildHbfPrepagos The current object (for fluent API support)
     */
    public function setHbfIngresoss(Collection $hbfIngresoss, ConnectionInterface $con = null)
    {
        /** @var ChildHbfIngresos[] $hbfIngresossToDelete */
        $hbfIngresossToDelete = $this->getHbfIngresoss(new Criteria(), $con)->diff($hbfIngresoss);


        $this->hbfIngresossScheduledForDeletion = $hbfIngresossToDelete;

        foreach ($hbfIngresossToDelete as $hbfIngresosRemoved) {
            $hbfIngresosRemoved->setHbfPrepagos(null);
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
                ->filterByHbfPrepagos($this)
                ->count($con);
        }

        return count($this->collHbfIngresoss);
    }

    /**
     * Method called to associate a ChildHbfIngresos object to this object
     * through the ChildHbfIngresos foreign key attribute.
     *
     * @param  ChildHbfIngresos $l ChildHbfIngresos
     * @return $this|\HbfPrepagos The current object (for fluent API support)
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
        $hbfIngresos->setHbfPrepagos($this);
    }

    /**
     * @param  ChildHbfIngresos $hbfIngresos The ChildHbfIngresos object to remove.
     * @return $this|ChildHbfPrepagos The current object (for fluent API support)
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
            $hbfIngresos->setHbfPrepagos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Otherwise if this HbfPrepagos is new, it will return
     * an empty collection; or if this HbfPrepagos has previously
     * been saved, it will retrieve related HbfIngresoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in HbfPrepagos.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCiUsuariosRelatedByIdCliente) {
            $this->aCiUsuariosRelatedByIdCliente->removeHbfPrepagosRelatedByIdCliente($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserCreated) {
            $this->aCiUsuariosRelatedByIdUserCreated->removeHbfPrepagosRelatedByIdUserCreated($this);
        }
        if (null !== $this->aCiUsuariosRelatedByIdUserModified) {
            $this->aCiUsuariosRelatedByIdUserModified->removeHbfPrepagosRelatedByIdUserModified($this);
        }
        if (null !== $this->aHbfSesiones) {
            $this->aHbfSesiones->removeHbfPrepagos($this);
        }
        if (null !== $this->aCiOptions) {
            $this->aCiOptions->removeHbfPrepagos($this);
        }
        if (null !== $this->aHbfTurnos) {
            $this->aHbfTurnos->removeHbfPrepagos($this);
        }
        $this->id_prepago = null;
        $this->id_cliente = null;
        $this->id_turno = null;
        $this->id_sesion = null;
        $this->fichas_total = null;
        $this->fichas_usadas = null;
        $this->fichas_gratis = null;
        $this->fichas_restantes = null;
        $this->id_option_tipo_prepago = null;
        $this->a_cuenta = null;
        $this->saldo = null;
        $this->importe = null;
        $this->pagado = null;
        $this->finalizado = null;
        $this->observaciones = null;
        $this->estado = null;
        $this->change_count = null;
        $this->id_user_created = null;
        $this->id_user_modified = null;
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
            if ($this->collHbfComandass) {
                foreach ($this->collHbfComandass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHbfIngresoss) {
                foreach ($this->collHbfIngresoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collHbfComandass = null;
        $this->collHbfIngresoss = null;
        $this->aCiUsuariosRelatedByIdCliente = null;
        $this->aCiUsuariosRelatedByIdUserCreated = null;
        $this->aCiUsuariosRelatedByIdUserModified = null;
        $this->aHbfSesiones = null;
        $this->aCiOptions = null;
        $this->aHbfTurnos = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(HbfPrepagosTableMap::DEFAULT_STRING_FORMAT);
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
