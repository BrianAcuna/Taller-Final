<?php

namespace Base;

use \Favoritos as ChildFavoritos;
use \FavoritosQuery as ChildFavoritosQuery;
use \Exception;
use \PDO;
use Map\FavoritosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'favoritos' table.
 *
 *
 *
 * @method     ChildFavoritosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFavoritosQuery orderByComentario($order = Criteria::ASC) Order by the comentario column
 *
 * @method     ChildFavoritosQuery groupById() Group by the id column
 * @method     ChildFavoritosQuery groupByComentario() Group by the comentario column
 *
 * @method     ChildFavoritosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFavoritosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFavoritosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFavoritosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFavoritosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFavoritosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFavoritosQuery leftJoinApartamentos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Apartamentos relation
 * @method     ChildFavoritosQuery rightJoinApartamentos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Apartamentos relation
 * @method     ChildFavoritosQuery innerJoinApartamentos($relationAlias = null) Adds a INNER JOIN clause to the query using the Apartamentos relation
 *
 * @method     ChildFavoritosQuery joinWithApartamentos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Apartamentos relation
 *
 * @method     ChildFavoritosQuery leftJoinWithApartamentos() Adds a LEFT JOIN clause and with to the query using the Apartamentos relation
 * @method     ChildFavoritosQuery rightJoinWithApartamentos() Adds a RIGHT JOIN clause and with to the query using the Apartamentos relation
 * @method     ChildFavoritosQuery innerJoinWithApartamentos() Adds a INNER JOIN clause and with to the query using the Apartamentos relation
 *
 * @method     \ApartamentosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFavoritos findOne(ConnectionInterface $con = null) Return the first ChildFavoritos matching the query
 * @method     ChildFavoritos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFavoritos matching the query, or a new ChildFavoritos object populated from the query conditions when no match is found
 *
 * @method     ChildFavoritos findOneById(int $id) Return the first ChildFavoritos filtered by the id column
 * @method     ChildFavoritos findOneByComentario(string $comentario) Return the first ChildFavoritos filtered by the comentario column *

 * @method     ChildFavoritos requirePk($key, ConnectionInterface $con = null) Return the ChildFavoritos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFavoritos requireOne(ConnectionInterface $con = null) Return the first ChildFavoritos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFavoritos requireOneById(int $id) Return the first ChildFavoritos filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFavoritos requireOneByComentario(string $comentario) Return the first ChildFavoritos filtered by the comentario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFavoritos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFavoritos objects based on current ModelCriteria
 * @method     ChildFavoritos[]|ObjectCollection findById(int $id) Return ChildFavoritos objects filtered by the id column
 * @method     ChildFavoritos[]|ObjectCollection findByComentario(string $comentario) Return ChildFavoritos objects filtered by the comentario column
 * @method     ChildFavoritos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FavoritosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FavoritosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'inmobiliaria', $modelName = '\\Favoritos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFavoritosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFavoritosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFavoritosQuery) {
            return $criteria;
        }
        $query = new ChildFavoritosQuery();
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
     * @return ChildFavoritos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FavoritosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FavoritosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFavoritos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, comentario FROM favoritos WHERE id = :p0';
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
            /** @var ChildFavoritos $obj */
            $obj = new ChildFavoritos();
            $obj->hydrate($row);
            FavoritosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFavoritos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFavoritosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FavoritosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFavoritosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FavoritosTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildFavoritosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FavoritosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FavoritosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FavoritosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the comentario column
     *
     * Example usage:
     * <code>
     * $query->filterByComentario('fooValue');   // WHERE comentario = 'fooValue'
     * $query->filterByComentario('%fooValue%', Criteria::LIKE); // WHERE comentario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comentario The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFavoritosQuery The current query, for fluid interface
     */
    public function filterByComentario($comentario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentario)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FavoritosTableMap::COL_COMENTARIO, $comentario, $comparison);
    }

    /**
     * Filter the query by a related \Apartamentos object
     *
     * @param \Apartamentos|ObjectCollection $apartamentos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildFavoritosQuery The current query, for fluid interface
     */
    public function filterByApartamentos($apartamentos, $comparison = null)
    {
        if ($apartamentos instanceof \Apartamentos) {
            return $this
                ->addUsingAlias(FavoritosTableMap::COL_ID, $apartamentos->getIdComentario(), $comparison);
        } elseif ($apartamentos instanceof ObjectCollection) {
            return $this
                ->useApartamentosQuery()
                ->filterByPrimaryKeys($apartamentos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByApartamentos() only accepts arguments of type \Apartamentos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Apartamentos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFavoritosQuery The current query, for fluid interface
     */
    public function joinApartamentos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Apartamentos');

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
            $this->addJoinObject($join, 'Apartamentos');
        }

        return $this;
    }

    /**
     * Use the Apartamentos relation Apartamentos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ApartamentosQuery A secondary query class using the current class as primary query
     */
    public function useApartamentosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinApartamentos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Apartamentos', '\ApartamentosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFavoritos $favoritos Object to remove from the list of results
     *
     * @return $this|ChildFavoritosQuery The current query, for fluid interface
     */
    public function prune($favoritos = null)
    {
        if ($favoritos) {
            $this->addUsingAlias(FavoritosTableMap::COL_ID, $favoritos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the favoritos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FavoritosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FavoritosTableMap::clearInstancePool();
            FavoritosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FavoritosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FavoritosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FavoritosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FavoritosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FavoritosQuery
