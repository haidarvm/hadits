<?php

/*
 * By Haidar Mar'ie Email = coder5@ymail.com MHadits
 */
class MHadits extends CI_Model {

    private $sqlite;

    public static $db = DBUSE;

    private $DBUSE;
    // private TABLEUSE =
    // private $lite;
    function __construct() {
        parent::__construct();
        $this->haditsdb = $this->load->database('sqlite', true);
    }

    function searchHaditsBool($words, $words_min = NULL, $imam_id, $limit = null) {
        $extract = $words;
        $imam = $imam_id != 0 ? " AND " . table_use() . ".imam_id IN ($imam_id)" : "";
        $this->haditsdb->select(table_use() . '.*, ' . docid() . ' AS docid, length(isi_indonesia) as simple, kitab_all.kitab_indonesia, bab_all.bab_indonesia ', FALSE);
        $this->haditsdb->join('kitab_all', table_use() . '.' . field('kitab_imam_id') . ' = kitab_all.kitab_imam_id AND ' . table_use() . '.' . field('imam_id') . ' = kitab_all.imam_id', "left");
        $this->haditsdb->join('bab_all', table_use() . '.' . field('bab_imam_id') . ' = bab_all.bab_imam_id AND ' . table_use() . '.' . field('imam_id') . ' = bab_all.imam_id', "left");
        $this->haditsdb->order_by('imam_id,simple', 'ASC');
        DBUSE == 'mysql' ? $this->haditsdb->where('MATCH (isi_indonesia) AGAINST ("' . $words . ' ' . $words_min . '" IN BOOLEAN MODE) ' . $imam, NULL, FALSE) : $this->haditsdb->where("isi_indonesia MATCH '" . $words . $words_min . "' " . $imam, NULL, FALSE);
        $msc = microtime(true);
        $query = $this->haditsdb->get(table_use());
        $this->firephp->log($this->haditsdb->last_query());
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function searchHaditsNo($imam_id, $no) {
        $sql = "SELECT h.*," . docid() . " as docid, kitab_indonesia, bab_indonesia FROM " . table_use() . "  h
				INNER JOIN kitab_all k ON h." . field('kitab_imam_id') . " = k.kitab_imam_id
						AND h." . field('imam_id') . " = k.imam_id
				INNER JOIN bab_all b ON h." . field('bab_imam_id') . " = b.bab_imam_id
						AND h." . field('imam_id') . " = b.imam_id
				WHERE h." . field("imam_id") . "=" . $imam_id . "
				AND " . field("no_hdt") . "=" . $no . "
				AND " . field("type") . "=1" . " GROUP BY h." . field("no_hdt");
        $this->firephp->log($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function searchBabKitab($word, $imam_id) {
        $imam = $imam_id != 0 ? " AND imam_id IN ($imam_id)" : "";
        $sqlite_query = "SELECT * FROM " . table_use() . "
		        WHERE isi_indonesia MATCH '$word ' $imam
		        AND type !=1
		        ORDER BY imam_id ASC";
        $this->firephp->log($sqlite_query);
        $msc = microtime(true);
        // echo DBUSE;
        $query = $this->haditsdb->query($sqlite_query);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }
    
    // SEARCH BY ARAB
    function searchHaditsBoolArab($words, $words_min = NULL, $imam_id, $pages = null) {
        $extract = $words;
        $imam = $imam_id != 0 ? " AND imam_id IN ($imam_id)" : "";
        $sql = "SELECT * FROM " . table_use() . "
		    	WHERE MATCH (isi_arab) AGAINST ('$words $words_min' IN BOOLEAN MODE) $imam
		    	ORDER BY imam_id ASC;
		    	";
        $sqlite = "SELECT * FROM `had_all_fts4`
		        WHERE isi_arab MATCH '$words $words_min' $imam
		        ORDER BY imam_id ASC LIMIT " . $limit . ",40";
        $this->firephp->log($sqlite);
        // die($sql);exit;
        $msc = microtime(true);
        $query = $this->haditsdb->query($sqlite);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }
    
    // SEARCH BY ARAB Gundul
    function searchHaditsBoolArabGundul($words, $words_min = NULL, $imam_id, $pages = null) {
        $extract = $words;
        $imam = $imam_id != 0 ? " AND imam_id IN ($imam_id)" : "";
        $sql = "SELECT * FROM `had_all_fts4`
		    	WHERE MATCH (isi_arab_gundul) AGAINST ('$words $words_min' IN BOOLEAN MODE) $imam
		    	ORDER BY imam_id ASC;
    	";
        $sqlite = "SELECT * FROM `had_all_fts4`
			    	WHERE isi_arab_gundul MATCH '$words $words_min' $imam
			    	ORDER BY imam_id ASC LIMIT " . $limit . ",40";
        $this->firephp->log($sqlite);
        // die($sql);exit;
        $msc = microtime(true);
        $query = $this->haditsdb->query($sqlite);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function searchHaditsLike($words, $imam_id) {
        $extract = $words;
        $imam = $imam_id != 0 ? " AND imam_id IN($imam_id)" : "";
        $sql = "SELECT * FROM `had_all_fts4` WHERE isi_indonesia LIKE '%$words%' $imam";
        // debug($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function searchHaditsLikeExact($words, $imam_id) {
        $extract = $words;
        $imam = $imam_id != 0 ? " AND imam_id IN($imam_id)" : "";
        $sql = "SELECT * FROM `had_all_fts4` WHERE isi_indonesia LIKE '$words' $imam";
        // debug($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function searchHaditsLikeArab($words, $imam_id) {
        $extract = $words;
        $imam = $imam_id != 0 ? " AND imam_id IN($imam_id)" : "";
        $sql = "SELECT * FROM `had_all_fts4` WHERE isi_arab_Gundul LIKE '%$words%' $imam";
        // debug($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function searchHaditsLikeExactArab($words, $imam_id) {
        $extract = $words;
        $imam = $imam_id != 0 ? " AND imam_id IN($imam_id)" : "";
        $sql = "SELECT * FROM `had_all_fts4`  
        		WHERE isi_arab_Gundul LIKE '% $words %' $imam";
        // debug($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function getAllKitab($imam) {
        $sql = "SELECT * FROM kitab_all 
        		WHERE imam_id =" . imam_id($imam);
        // debug($sql);
        $msc = microtime(true);
        // $query = $this->haditsdb->query ( $sql );
        $query = $this->haditsdb->get_where('kitab_all', array(
            'imam_id' => imam_id($imam)
        ));
        query_exec_time(microtime(true) - $msc);
        return $query->result();
    }

    function getKitabBabId($imam, $bab_imam_id) {
        $sql = "SELECT * FROM bab_all b
        		INNER JOIN kitab_all k ON b.kitab_imam_id = k.kitab_imam_id AND b.imam_id = k.imam_id
        		WHERE b.imam_id=" . imam_id($imam) . "
        		 AND b.bab_imam_id=" . $bab_imam_id;
        $this->firephp->log('babSql' . $sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query->row();
    }

    function getIdKitab($imam, $kitab_imam_id) {
        $sql = "SELECT * FROM kitab_all 
        		WHERE imam_id =" . imam_id($imam) . "
        		AND kitab_imam_id=" . $kitab_imam_id;
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query->row();
    }

    function getAllBab($imam, $kitab_imam_id) {
        $sql = "SELECT * FROM bab_all 
        		WHERE imam_id=" . imam_id($imam) . "
        		AND kitab_imam_id =" . $kitab_imam_id;
        // debug($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query->result();
    }

    function getIdBab($imam, $bab_imam_id) {
        $sql = "SELECT * FROM bab_all  
        		WHERE imam_id=" . imam_id($imam) . "
        		 AND bab_imam_id=" . $bab_imam_id;
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query->row();
    }

    function getTemaIdBab($imam, $bab_imam_id) {
        $sql = "SELECT * FROM " . table_use() . " 
        		WHERE " . field('imam_id') . " =" . imam_id($imam) . " AND " . field('type') . "=1 AND " . field('bab_imam_id') . "=" . $bab_imam_id;
        $this->firephp->log($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query;
    }

    function getHaditsIdHdt($imam, $id_hadits) {
        $sql = "SELECT * FROM " . table_use() . "  
        		WHERE " . field('imam_id') . " =" . imam_id($imam) . "
        				AND " . field('no_hdt') . "=" . $id_hadits;
        $this->firephp->log($sql);
        $msc = microtime(true);
        $query = $this->haditsdb->query($sql);
        query_exec_time(microtime(true) - $msc);
        return $query->row();
    }

    function countHadits() {
        $sql = "SELECT count(had_id) as c, imam_nama FROM had_all h
				INNER JOIN imam i ON i.imam_id = h.imam_id
				GROUP BY h.imam_id 
				ORDER BY c DESC";
        $query = $this->haditsdb->query($sql);
        return $query;
    }

}

# OLD

// $db = $this->
// $this->haditsdbUSE = DBUSE;
// $this->had_table = TABLEUSE;
// $this->sqlite = $this->load->database('sqlite', TRUE);
// $lite = $this->load->database('sqlite', TRUE);
// $sql = "SELECT h.*,had_id AS docid, length(isi_indonesia) as simple, k.kitab_indonesia, b.bab_indonesia FROM ".table_use()." h
// LEFT JOIN kitab_all k ON h.".field('kitab_imam_id')." = k.kitab_imam_id
// AND h.".field('imam_id')." = k.imam_id
// LEFT JOIN bab_all b ON h.".field('bab_imam_id')." = b.bab_imam_id
// AND h.".field('imam_id')." = b.imam_id
// WHERE MATCH (isi_indonesia) AGAINST ('$words $words_min' IN BOOLEAN MODE) $imam
// ORDER BY imam_id, simple ASC";
// 		$sqlite_query = "SELECT h.*,docid, length(isi_indonesia) as simple, k.kitab_indonesia, b.bab_indonesia
// 		        		FROM " . table_use () . " h
// 		        		LEFT JOIN kitab_all k ON h." . field ( 'kitab_imam_id' ) . " = k.kitab_imam_id
// 								AND h." . field ( 'imam_id' ) . " = k.imam_id
// 						LEFT JOIN bab_all b ON h." . field ( 'bab_imam_id' ) . " = b.bab_imam_id
// 								AND h." . field ( 'imam_id' ) . " = b.imam_id
// 				        WHERE isi_indonesia MATCH '$words $words_min' $imam
// 				        ORDER BY imam_id, simple ASC";
// echo DBUSE;
// echo use_dbs();exit;
// 		$sql_query = DBUSE == "mysql" ? $sql : $sqlite_query;
// 		$query = $this->haditsdb->query ( $sql_query );
// $query2 = $this->sqlite->get('had_all_fts4', 10, 20);
// 		echo $this->last_query();
