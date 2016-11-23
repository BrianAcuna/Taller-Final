<?php

namespace Base;

use \Apartamentos as ChildApartamentos;
use \ApartamentosQuery as ChildApartamentosQuery;
use \Exception;
use \PDO;
use Map\ApartamentosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'apartamentos' table.
 *
 *
 *
 * @method     ChildApartamentosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildApartamentosQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     ChildApartamentosQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ChildApartamentosQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 * @method     ChildApartamentosQuery orderByLatitud($order = Criteria::ASC) Order by the latitud column
 * @method     ChildApartamentosQuery orderByLongitud($order = Criteria::ASC) Order by the longitud column
 * @method     ChildApartamentosQuery orderByIdComentario($order = Criteria::ASC) Order by the id_comentario column
 * @method     ChildApartamentosQuery orderByIdTipo($order = Criteria::ASC) Order by the id_tipo column
 *
 * @method     ChildApartamentosQuery groupById() Group by the id column
 * @method     ChildApartamentosQuery groupByDireccion() Group by the direccion column
 * @method     ChildApartamentosQuery groupByDescripcion() Group by the descripcion column
 * @method     ChildApartamentosQuery groupByPrecio() Group by the precio column
 * @method     ChildApartamentosQuery groupByLatitud() Group by the latitud column
 * @method     ChildApartamentosQuery groupByLongitud() Group by the longitud column
 * @method     ChildApartamentosQuery groupByIdComentario() Group by the id_comentario column
 * @method     ChildApartamentosQuery groupByIdTipo() Group by the id_tipo column
 *
 * @method     ChildApartamentosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildApartamentosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildApartamentosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildApartamentosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildApartamentosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildApartamentosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildApartamentosQuery leftJoinFavoritos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Favoritos relation
 * @method     ChildApartamentosQuery rightJoinFavoritos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Favoritos relation
 * @method     ChildApartamentosQuery innerJoinFavoritos($relationAlias = null) Adds a INNER JOIN clause to the query using the Favoritos relation
 *
 * @method     ChildApartamentosQuery joinWithFavoritos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Favoritos relation
 *
 * @method     ChildApartamentosQuery leftJoinWithFavoritos() Adds a LEFT JOIN clause and with to the query using the Favoritos relation
 * @method     ChildApartamentosQuery rightJoinWithFavoritos() Adds a RIGHT JOIN clause and with to the query using the Favoritos relation
 * @method     ChildApartamentosQuery innerJoinWithFavoritos() Adds a INNER JOIN clause and with to the query using the Favoritos relation
 *
 * @method     ChildApartamentosQuery leftJoinTipos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tipos relation
 * @method     ChildApartamentosQuery rightJoinTipos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tipos relation
 * @method     ChildApartamentosQuery innerJoinTipos($relationAlias = null) Adds a INNER JOIN clause to the query using the Tipos relation
 *
 * @method     ChildApartamentosQuery joinWithTipos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tipos relation
 *
 * @method     ChildApartamentosQuery leftJoinWithTipos() Adds a LEFT JOIN clause and with to the query using the Tipos relation
 * @method     ChildApartamentosQuery rightJoinWithTipos() Adds a RIGHT JOIN clause and with to the query using the Tipos relation
 * @method     ChildApartamentosQuery innerJoinWithTipos() Adds a INNER JOIN clause and with to the query using the Tipos relation
 *
 * @method     \FavoritosQuery|\TiposQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildApartamentos findOne(ConnectionInterface $con = null) Return the first ChildApartamentos matching the query
 * @method     ChildApartamentos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildApartamentos matching the query, or a new ChildApartamentos object populated from the query conditions when no match is found
 *
 * @method     ChildApartamentos findOneById(int $id) Return the first ChildApartamentos filtered by the id column
 * @method     ChildApartamentos findOneByDireccion(string $direccion) Return the first ChildApartamentos filtered by the direccion column
 * @method     ChildApartamentos findOneByDescripcion(string $descripcion) Return the first ChildApartamentos filtered by the descripcion column
 * @method     ChildApartamentos findOneByPrecio(int $precio) Return the first ChildApartamentos filtered by the precio column
 * @method     ChildApartamentos findOneByLatitud(string $latitud) Return the first ChildApartamentos filtered by the latitud column
 * @method     ChildApartamentos findOneByLongitud(string $longitud) Return the first ChildApartamentos filtered by the longitud column
 * @method     ChildApartamentos findOneByIdComentario(int $id_comentario) Return the first ChildApartamentos filtered by the id_comentario column
 * @method     ChildApartamentos findOneByIdTipo(int $id_tipo) Return the first ChildApartamentos filtered by the id_tipo column *

 * @method     ChildApartamentos requirePk($key, ConnectionInterface $con = null) Return the ChildApartamentos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOne(ConnectionInterface $con = null) Return the first ChildApartamentos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildApartamentos requireOneById(int $id) Return the first ChildApartamentos filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOneByDireccion(string $direccion) Return the first ChildApartamentos filtered by the direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOneByDescripcion(string $descripcion) Return the first ChildApartamentos filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOneByPrecio(int $precio) Return the first ChildApartamentos filtered by the precio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOneByLatitud(string $latitud) Return the first ChildApartamentos filtered by the latitud column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOneByLongitud(string $longitud) Return the first ChildApartamentos filtered by the longitud column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOneByIdComentario(int $id_comentario) Return the first ChildApartamentos filtered by the id_comentario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildApartamentos requireOneByIdTipo(int $id_tipo) Return the first ChildApartamentos filtered by the id_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildApartamentos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildApartamentos objects based on current ModelCriteria
 * @method     ChildApartamentos[]|ObjectCollection findById(int $id) Return ChildApartamentos objects filtered by the id column
 * @method     ChildApartamentos[]|ObjectCollection findByDireccion(string $direccion) Return ChildApartamentos objects filtered by the direccion column
 * @method     ChildApartamentos[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildApartamentos objects filtered by the descripcion column
 * @method     ChildApartamentos[]|ObjectCollection findByPrecio(int $precio) Return ChildApartamentos objects filtered by the precio column
 * @method     ChildApartamentos[]|ObjectCollection findByLatitud(string $latitud) Return ChildApartamentos objects filtered by the latitud column
 * @method     ChildApartamentos[]|ObjectCollection findByLongitud(string $longitud) Return ChildApartamentos objects filtered by the longitud column
 * @method     ChildApartamentos[]|ObjectCollection findByIdComentario(int $id_comentario) Return ChildApartamentos objects filtered by the id_comentario column
 * @method     ChildApartamentos[]|ObjectCollection findByIdTipo(int $id_tipo) Return ChildApartamentos objects filtered by the id_tipo column
 * @method     ChildApartamentos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ApartamentosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ApartamentosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'inmobiliaria', $modelName = '\\Apartamentos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildApartamentosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildApartamentosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildApartamentosQuery) {
            return $criteria;
        }
        $query = new ChildApartamentosQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildApartamentos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ApartamentosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ApartamentosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildApartamentos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, direccion, descripcion, precio, latitud, longitud, id_comentario, id_tipo FROM apartamentos WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildApartamentos $obj */
            $obj = new ChildApartamentos();
            $obj->hydrate($row);
            ApartamentosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildApartamentos|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ApartamentosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ApartamentosTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%', Criteria::LIKE); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%', Criteria::LIKE); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the precio column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecio(1234); // WHERE precio = 1234
     * $query->filterByPrecio(array(12, 34)); // WHERE precio IN (12, 34)
     * $query->filterByPrecio(array('min' => 12)); // WHERE precio > 12
     * </code>
     *
     * @param     mixed $precio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByPrecio($precio = null, $comparison = null)
    {
        if (is_array($precio)) {
            $useMinMax = false;
            if (isset($precio['min'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precio['max'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_PRECIO, $precio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_PRECIO, $precio, $comparison);
    }

    /**
     * Filter the query on the latitud column
     *
     * Example usage:
     * <code>
     * $query->filterByLatitud('fooValue');   // WHERE latitud = 'fooValue'
     * $query->filterByLatitud('%fooValue%', Criteria::LIKE); // WHERE latitud LIKE '%fooValue%'
     * </code>
     *
     * @param     string $latitud The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByLatitud($latitud = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($latitud)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_LATITUD, $latitud, $comparison);
    }

    /**
     * Filter the query on the longitud column
     *
     * Example usage:
     * <code>
     * $query->filterByLongitud('fooValue');   // WHERE longitud = 'fooValue'
     * $query->filterByLongitud('%fooValue%', Criteria::LIKE); // WHERE longitud LIKE '%fooValue%'
     * </code>
     *
     * @param     string $longitud The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByLongitud($longitud = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longitud)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_LONGITUD, $longitud, $comparison);
    }

    /**
     * Filter the query on the id_comentario column
     *
     * Example usage:
     * <code>
     * $query->filterByIdComentario(1234); // WHERE id_comentario = 1234
     * $query->filterByIdComentario(array(12, 34)); // WHERE id_comentario IN (12, 34)
     * $query->filterByIdComentario(array('min' => 12)); // WHERE id_comentario > 12
     * </code>
     *
     * @see       filterByFavoritos()
     *
     * @param     mixed $idComentario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByIdComentario($idComentario = null, $comparison = null)
    {
        if (is_array($idComentario)) {
            $useMinMax = false;
            if (isset($idComentario['min'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_ID_COMENTARIO, $idComentario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idComentario['max'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_ID_COMENTARIO, $idComentario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_ID_COMENTARIO, $idComentario, $comparison);
    }

    /**
     * Filter the query on the id_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTipo(1234); // WHERE id_tipo = 1234
     * $query->filterByIdTipo(array(12, 34)); // WHERE id_tipo IN (12, 34)
     * $query->filterByIdTipo(array('min' => 12)); // WHERE id_tipo > 12
     * </code>
     *
     * @see       filterByTipos()
     *
     * @param     mixed $idTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByIdTipo($idTipo = null, $comparison = null)
    {
        if (is_array($idTipo)) {
            $useMinMax = false;
            if (isset($idTipo['min'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_ID_TIPO, $idTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTipo['max'])) {
                $this->addUsingAlias(ApartamentosTableMap::COL_ID_TIPO, $idTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApartamentosTableMap::COL_ID_TIPO, $idTipo, $comparison);
    }

    /**
     * Filter the query by a related \Favoritos object
     *
     * @param \Favoritos|ObjectCollection $favoritos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByFavoritos($favoritos, $comparison = null)
    {
        if ($favoritos instanceof \Favoritos) {
            return $this
                ->addUsingAlias(ApartamentosTableMap::COL_ID_COMENTARIO, $favoritos->getId(), $comparison);
        } elseif ($favoritos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ApartamentosTableMap::COL_ID_COMENTARIO, $favoritos->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFavoritos() only accepts arguments of type \Favoritos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Favoritos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function joinFavoritos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Favoritos');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Favoritos');
        }

        return $this;
    }

    /**
     * Use the Favoritos relation Favoritos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FavoritosQuery A secondary query class using the current class as primary query
     */
    public function useFavoritosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFavoritos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Favoritos', '\FavoritosQuery');
    }

    /**
     * Filter the query by a related \Tipos object
     *
     * @param \Tipos|ObjectCollection $tipos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildApartamentosQuery The current query, for fluid interface
     */
    public function filterByTipos($tipos, $comparison = null)
    {
        if ($tipos instanceof \Tipos) {
            return $this
                ->addUsingAlias(ApartamentosTableMap::COL_ID_TIPO, $tipos->getId(), $comparison);
        } elseif ($tipos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ApartamentosTableMap::COL_ID_TIPO, $tipos->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTipos() only accepts arguments of type \Tipos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tipos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function joinTipos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tipos');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tipos');
        }

        return $this;
    }

    /**
     * Use the Tipos relation Tipos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TiposQuery A secondary query class using the current class as primary query
     */
    public function useTiposQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTipos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tipos', '\TiposQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildApartamentos $apartamentos Object to remove from the list of results
     *
     * @return $this|ChildApartamentosQuery The current query, for fluid interface
     */
    public function prune($apartamentos = null)
    {
        if ($apartamentos) {
            $this->addUsingAlias(ApartamentosTableMap::COL_ID, $apartamentos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the apartamentos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ApartamentosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ApartamentosTableMap::clearInstancePool();
            ApartamentosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ApartamentosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ApartamentosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ApartamentosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ApartamentosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ApartamentosQuery
