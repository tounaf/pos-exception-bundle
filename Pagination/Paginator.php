<?php


namespace POS\ExceptionBundle\Pagination;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\QueryBuilder as DoctrineQueryBuilder;
use Doctrine\ORM\Tools\Pagination\CountWalker;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
class Paginator
{
    const PAGE_SIZE = 10;
    /**
     * @var $totalResult
     */
    private $totalResult;
    /**
     * @var $results
     */
    private $results;
    /**
     * @var null $pageSize
     */
    private $pageSize;
    /**
     * @var $currentPage
     */
    private $currentPage;
    /**
     * @var QueryBuilder $queryBuilder
     */
    private $queryBuilder;
    public function __construct(DoctrineQueryBuilder $queryBuilder, $pageSize = null)
    {
        $this->queryBuilder = $queryBuilder;
        $this->pageSize = $pageSize;

    }

    /**
     * @param $page
     * @return $this
     * @throws \Exception
     */
    public function paginate($page)
    {
        $this->currentPage = max(1, $page);
        $firstResult = ($this->currentPage - 1 ) * $this->pageSize;
        $query = $this->results = $this->queryBuilder
                ->setFirstResult($firstResult)
                ->setMaxResults($this->pageSize)
                ->getQuery();
        if (0 === \count($this->queryBuilder->getDQLPart('join'))) {
            $query->setHint(CountWalker::HINT_DISTINCT, false);
        }

        $paginator = new DoctrinePaginator($query);

        $useOutputWalkers = \count($this->queryBuilder->getDQLPart('having') ?: []) > 0;
        $paginator->setUseOutputWalkers($useOutputWalkers);

        $this->results = $paginator->getIterator()->getArrayCopy();
        $this->totalResult = $paginator->count();

        return $this;

    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->totalResult;
    }

    /**
     * @return null
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }
}
