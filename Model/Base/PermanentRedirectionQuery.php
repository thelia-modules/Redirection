<?php

namespace Redirection\Model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Redirection\Model\PermanentRedirection as ChildPermanentRedirection;
use Redirection\Model\PermanentRedirectionI18nQuery as ChildPermanentRedirectionI18nQuery;
use Redirection\Model\PermanentRedirectionQuery as ChildPermanentRedirectionQuery;
use Redirection\Model\Map\PermanentRedirectionTableMap;

/**
 * Base class that represents a query for the 'permanent_redirection' table.
 *
 *
 *
 * @method     ChildPermanentRedirectionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPermanentRedirectionQuery orderByVisible($order = Criteria::ASC) Order by the visible column
 * @method     ChildPermanentRedirectionQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildPermanentRedirectionQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     ChildPermanentRedirectionQuery orderByDestination($order = Criteria::ASC) Order by the destination column
 * @method     ChildPermanentRedirectionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildPermanentRedirectionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildPermanentRedirectionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method     ChildPermanentRedirectionQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method     ChildPermanentRedirectionQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 *
 * @method     ChildPermanentRedirectionQuery groupById() Group by the id column
 * @method     ChildPermanentRedirectionQuery groupByVisible() Group by the visible column
 * @method     ChildPermanentRedirectionQuery groupByPosition() Group by the position column
 * @method     ChildPermanentRedirectionQuery groupByPath() Group by the path column
 * @method     ChildPermanentRedirectionQuery groupByDestination() Group by the destination column
 * @method     ChildPermanentRedirectionQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildPermanentRedirectionQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildPermanentRedirectionQuery groupByVersion() Group by the version column
 * @method     ChildPermanentRedirectionQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method     ChildPermanentRedirectionQuery groupByVersionCreatedBy() Group by the version_created_by column
 *
 * @method     ChildPermanentRedirectionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPermanentRedirectionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPermanentRedirectionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPermanentRedirectionQuery leftJoinPermanentRedirectionI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the PermanentRedirectionI18n relation
 * @method     ChildPermanentRedirectionQuery rightJoinPermanentRedirectionI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PermanentRedirectionI18n relation
 * @method     ChildPermanentRedirectionQuery innerJoinPermanentRedirectionI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the PermanentRedirectionI18n relation
 *
 * @method     ChildPermanentRedirectionQuery leftJoinPermanentRedirectionVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the PermanentRedirectionVersion relation
 * @method     ChildPermanentRedirectionQuery rightJoinPermanentRedirectionVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PermanentRedirectionVersion relation
 * @method     ChildPermanentRedirectionQuery innerJoinPermanentRedirectionVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the PermanentRedirectionVersion relation
 *
 * @method     ChildPermanentRedirection findOne(ConnectionInterface $con = null) Return the first ChildPermanentRedirection matching the query
 * @method     ChildPermanentRedirection findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPermanentRedirection matching the query, or a new ChildPermanentRedirection object populated from the query conditions when no match is found
 *
 * @method     ChildPermanentRedirection findOneById(int $id) Return the first ChildPermanentRedirection filtered by the id column
 * @method     ChildPermanentRedirection findOneByVisible(int $visible) Return the first ChildPermanentRedirection filtered by the visible column
 * @method     ChildPermanentRedirection findOneByPosition(int $position) Return the first ChildPermanentRedirection filtered by the position column
 * @method     ChildPermanentRedirection findOneByPath(string $path) Return the first ChildPermanentRedirection filtered by the path column
 * @method     ChildPermanentRedirection findOneByDestination(string $destination) Return the first ChildPermanentRedirection filtered by the destination column
 * @method     ChildPermanentRedirection findOneByCreatedAt(string $created_at) Return the first ChildPermanentRedirection filtered by the created_at column
 * @method     ChildPermanentRedirection findOneByUpdatedAt(string $updated_at) Return the first ChildPermanentRedirection filtered by the updated_at column
 * @method     ChildPermanentRedirection findOneByVersion(int $version) Return the first ChildPermanentRedirection filtered by the version column
 * @method     ChildPermanentRedirection findOneByVersionCreatedAt(string $version_created_at) Return the first ChildPermanentRedirection filtered by the version_created_at column
 * @method     ChildPermanentRedirection findOneByVersionCreatedBy(string $version_created_by) Return the first ChildPermanentRedirection filtered by the version_created_by column
 *
 * @method     array findById(int $id) Return ChildPermanentRedirection objects filtered by the id column
 * @method     array findByVisible(int $visible) Return ChildPermanentRedirection objects filtered by the visible column
 * @method     array findByPosition(int $position) Return ChildPermanentRedirection objects filtered by the position column
 * @method     array findByPath(string $path) Return ChildPermanentRedirection objects filtered by the path column
 * @method     array findByDestination(string $destination) Return ChildPermanentRedirection objects filtered by the destination column
 * @method     array findByCreatedAt(string $created_at) Return ChildPermanentRedirection objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildPermanentRedirection objects filtered by the updated_at column
 * @method     array findByVersion(int $version) Return ChildPermanentRedirection objects filtered by the version column
 * @method     array findByVersionCreatedAt(string $version_created_at) Return ChildPermanentRedirection objects filtered by the version_created_at column
 * @method     array findByVersionCreatedBy(string $version_created_by) Return ChildPermanentRedirection objects filtered by the version_created_by column
 *
 */
abstract class PermanentRedirectionQuery extends ModelCriteria
{

    // versionable behavior

    /**
     * Whether the versioning is enabled
     */
    static $isVersioningEnabled = true;

    /**
     * Initializes internal state of \Redirection\Model\Base\PermanentRedirectionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\Redirection\\Model\\PermanentRedirection', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPermanentRedirectionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPermanentRedirectionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \Redirection\Model\PermanentRedirectionQuery) {
            return $criteria;
        }
        $query = new \Redirection\Model\PermanentRedirectionQuery();
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
     * @return ChildPermanentRedirection|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PermanentRedirectionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PermanentRedirectionTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildPermanentRedirection A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, VISIBLE, POSITION, PATH, DESTINATION, CREATED_AT, UPDATED_AT, VERSION, VERSION_CREATED_AT, VERSION_CREATED_BY FROM permanent_redirection WHERE ID = :p0';
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
            $obj = new ChildPermanentRedirection();
            $obj->hydrate($row);
            PermanentRedirectionTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPermanentRedirection|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
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
    public function findPks($keys, $con = null)
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
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PermanentRedirectionTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PermanentRedirectionTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the visible column
     *
     * Example usage:
     * <code>
     * $query->filterByVisible(1234); // WHERE visible = 1234
     * $query->filterByVisible(array(12, 34)); // WHERE visible IN (12, 34)
     * $query->filterByVisible(array('min' => 12)); // WHERE visible > 12
     * </code>
     *
     * @param     mixed $visible The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByVisible($visible = null, $comparison = null)
    {
        if (is_array($visible)) {
            $useMinMax = false;
            if (isset($visible['min'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::VISIBLE, $visible['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visible['max'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::VISIBLE, $visible['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::VISIBLE, $visible, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition(1234); // WHERE position = 1234
     * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
     * $query->filterByPosition(array('min' => 12)); // WHERE position > 12
     * </code>
     *
     * @param     mixed $position The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (is_array($position)) {
            $useMinMax = false;
            if (isset($position['min'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::POSITION, $position['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($position['max'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::POSITION, $position['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::POSITION, $position, $comparison);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%'); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $path)) {
                $path = str_replace('*', '%', $path);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::PATH, $path, $comparison);
    }

    /**
     * Filter the query on the destination column
     *
     * Example usage:
     * <code>
     * $query->filterByDestination('fooValue');   // WHERE destination = 'fooValue'
     * $query->filterByDestination('%fooValue%'); // WHERE destination LIKE '%fooValue%'
     * </code>
     *
     * @param     string $destination The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByDestination($destination = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($destination)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $destination)) {
                $destination = str_replace('*', '%', $destination);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::DESTINATION, $destination, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version > 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the version_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedAt('2011-03-14'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt('now'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt(array('max' => 'yesterday')); // WHERE version_created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $versionCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(PermanentRedirectionTableMap::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
    }

    /**
     * Filter the query on the version_created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedBy('fooValue');   // WHERE version_created_by = 'fooValue'
     * $query->filterByVersionCreatedBy('%fooValue%'); // WHERE version_created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $versionCreatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedBy($versionCreatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($versionCreatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $versionCreatedBy)) {
                $versionCreatedBy = str_replace('*', '%', $versionCreatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PermanentRedirectionTableMap::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query by a related \Redirection\Model\PermanentRedirectionI18n object
     *
     * @param \Redirection\Model\PermanentRedirectionI18n|ObjectCollection $permanentRedirectionI18n  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByPermanentRedirectionI18n($permanentRedirectionI18n, $comparison = null)
    {
        if ($permanentRedirectionI18n instanceof \Redirection\Model\PermanentRedirectionI18n) {
            return $this
                ->addUsingAlias(PermanentRedirectionTableMap::ID, $permanentRedirectionI18n->getId(), $comparison);
        } elseif ($permanentRedirectionI18n instanceof ObjectCollection) {
            return $this
                ->usePermanentRedirectionI18nQuery()
                ->filterByPrimaryKeys($permanentRedirectionI18n->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPermanentRedirectionI18n() only accepts arguments of type \Redirection\Model\PermanentRedirectionI18n or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PermanentRedirectionI18n relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function joinPermanentRedirectionI18n($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PermanentRedirectionI18n');

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
            $this->addJoinObject($join, 'PermanentRedirectionI18n');
        }

        return $this;
    }

    /**
     * Use the PermanentRedirectionI18n relation PermanentRedirectionI18n object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Redirection\Model\PermanentRedirectionI18nQuery A secondary query class using the current class as primary query
     */
    public function usePermanentRedirectionI18nQuery($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        return $this
            ->joinPermanentRedirectionI18n($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PermanentRedirectionI18n', '\Redirection\Model\PermanentRedirectionI18nQuery');
    }

    /**
     * Filter the query by a related \Redirection\Model\PermanentRedirectionVersion object
     *
     * @param \Redirection\Model\PermanentRedirectionVersion|ObjectCollection $permanentRedirectionVersion  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function filterByPermanentRedirectionVersion($permanentRedirectionVersion, $comparison = null)
    {
        if ($permanentRedirectionVersion instanceof \Redirection\Model\PermanentRedirectionVersion) {
            return $this
                ->addUsingAlias(PermanentRedirectionTableMap::ID, $permanentRedirectionVersion->getId(), $comparison);
        } elseif ($permanentRedirectionVersion instanceof ObjectCollection) {
            return $this
                ->usePermanentRedirectionVersionQuery()
                ->filterByPrimaryKeys($permanentRedirectionVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPermanentRedirectionVersion() only accepts arguments of type \Redirection\Model\PermanentRedirectionVersion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PermanentRedirectionVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function joinPermanentRedirectionVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PermanentRedirectionVersion');

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
            $this->addJoinObject($join, 'PermanentRedirectionVersion');
        }

        return $this;
    }

    /**
     * Use the PermanentRedirectionVersion relation PermanentRedirectionVersion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Redirection\Model\PermanentRedirectionVersionQuery A secondary query class using the current class as primary query
     */
    public function usePermanentRedirectionVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPermanentRedirectionVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PermanentRedirectionVersion', '\Redirection\Model\PermanentRedirectionVersionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPermanentRedirection $permanentRedirection Object to remove from the list of results
     *
     * @return ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function prune($permanentRedirection = null)
    {
        if ($permanentRedirection) {
            $this->addUsingAlias(PermanentRedirectionTableMap::ID, $permanentRedirection->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the permanent_redirection table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PermanentRedirectionTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PermanentRedirectionTableMap::clearInstancePool();
            PermanentRedirectionTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildPermanentRedirection or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildPermanentRedirection object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PermanentRedirectionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PermanentRedirectionTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        PermanentRedirectionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PermanentRedirectionTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(PermanentRedirectionTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(PermanentRedirectionTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(PermanentRedirectionTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(PermanentRedirectionTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(PermanentRedirectionTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(PermanentRedirectionTableMap::CREATED_AT);
    }

    // i18n behavior

    /**
     * Adds a JOIN clause to the query using the i18n relation
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function joinI18n($locale = 'en_US', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $relationName = $relationAlias ? $relationAlias : 'PermanentRedirectionI18n';

        return $this
            ->joinPermanentRedirectionI18n($relationAlias, $joinType)
            ->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
    }

    /**
     * Adds a JOIN clause to the query and hydrates the related I18n object.
     * Shortcut for $c->joinI18n($locale)->with()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildPermanentRedirectionQuery The current query, for fluid interface
     */
    public function joinWithI18n($locale = 'en_US', $joinType = Criteria::LEFT_JOIN)
    {
        $this
            ->joinI18n($locale, null, $joinType)
            ->with('PermanentRedirectionI18n');
        $this->with['PermanentRedirectionI18n']->setIsWithOneToMany(false);

        return $this;
    }

    /**
     * Use the I18n relation query object
     *
     * @see       useQuery()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildPermanentRedirectionI18nQuery A secondary query class using the current class as primary query
     */
    public function useI18nQuery($locale = 'en_US', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinI18n($locale, $relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PermanentRedirectionI18n', '\Redirection\Model\PermanentRedirectionI18nQuery');
    }

    // versionable behavior

    /**
     * Checks whether versioning is enabled
     *
     * @return boolean
     */
    static public function isVersioningEnabled()
    {
        return self::$isVersioningEnabled;
    }

    /**
     * Enables versioning
     */
    static public function enableVersioning()
    {
        self::$isVersioningEnabled = true;
    }

    /**
     * Disables versioning
     */
    static public function disableVersioning()
    {
        self::$isVersioningEnabled = false;
    }

} // PermanentRedirectionQuery
