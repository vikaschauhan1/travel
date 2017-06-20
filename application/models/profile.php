<?php

Class Profile extends CI_Model {

    function get_profile($id) {

        $this->db->where('user_id', $id);
        $query = $this->db->get('users_profile');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        }
        return array();
    }

    function getRank($id) {
        $this->db->select('rank', false);
        $this->db->from('((SELECT guide_id, avgrating, FIND_IN_SET( avgrating,(select * from rate)
        ) as rank from avgrate) as result)');
        
        $this->db->where('guide_id = ', $id);
         $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $row = $query->row();
            return $row;
        }
        return array();
    }

    function getAvgRating($id) {
        $this->db->select('AVG(rating) as avgrating', false);
        $this->db->from('ratings');
        $this->db->where('guide_id = ', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $row = $query->row();
            return $row;
        }
        return array();
    }

    function getGuidesByLocation($locationId = 0, $languageId = array(), $priceFilter = 0, $genderFilter = 0, $ageFilter = 0, $expFilter = 0) {

        $this->db->select('users_profile.id, users_profile.location_id,users_profile.about_me, users_profile.age, users_profile.gender, '
                . 'users.firstname,users_profile.user_id, users_profile.views, users_profile.price, users_profile.language_id,location.location, '
                . 'users.lastname, users.email, users.phone, users.role', false);
        $this->db->from('users_profile');
        $this->db->join('users', 'users_profile.user_id = users.id');
        
        $this->db->join('location', 'location.id = users_profile.location_id');
        
        $this->db->where('users.role = ', '2');
        
        $languageId = array_filter($languageId);
        
        if (!empty($languageId)) {
            $this->db->where('FIND_IN_SET('.$languageId[0].',users_profile.language_id)!=',0);
            unset($languageId[0]);
            foreach($languageId as $language){
             $this->db->or_where('FIND_IN_SET('.$language.',users_profile.language_id)!=',0);
            }
        }
        if ($locationId) {
            $this->db->where('users_profile.location_id = ', $locationId);
        }

        if ($priceFilter) {
            $pricefilterRange = $this->getPriceRangeFilter($priceFilter);
            if ($pricefilterRange['price_from']) {
                $this->db->where('users_profile.price >= ', $pricefilterRange['price_from']);
            }
            if ($pricefilterRange['price_to']) {
                $this->db->where('users_profile.price <= ', $pricefilterRange['price_to']);
            }
        }
        if ($genderFilter) {
            $this->db->where('users_profile.gender = ', $genderFilter);
        }

        if ($ageFilter) {
            $agefilterRange = $this->getAgeFilter($ageFilter);
            if ($agefilterRange['age_from']) {
                $this->db->where('users_profile.age >= ', $agefilterRange['age_from']);
            }
            if ($agefilterRange['age_to']) {
                $this->db->where('users_profile.age <= ', $agefilterRange['age_to']);
            }
        }

        if ($expFilter) {
            $expfilterRange = $this->getExpFilter($expFilter);
            if ($expfilterRange['exp_from']) {
                $this->db->where('users_profile.experience >= ', $expfilterRange['exp_from']);
            }
            if ($expfilterRange['exp_to']) {
                $this->db->where('users_profile.experience <= ', $expfilterRange['exp_to']);
            }
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $rows = $query->result_array();
            return $rows;
        }

        return array();
    }

    function getAgeFilter($ageFilter) {
        $ageFilterRange = array();

        switch ($ageFilter) {
            case 1:
                $ageFilterRange['age_from'] = 21;
                $ageFilterRange['age_to'] = 25;
                break;
            case 2:
                $ageFilterRange['age_from'] = 26;
                $ageFilterRange['age_to'] = 30;
                break;
            case 3:
                $ageFilterRange['age_from'] = 31;
                $ageFilterRange['age_to'] = 35;
                break;
            case 4:
                $ageFilterRange['age_from'] = 36;
                $ageFilterRange['age_to'] = 40;
                break;
            case 5:
                $ageFilterRange['age_from'] = 41;
                $ageFilterRange['age_to'] = 45;
                break;
            case 6:
                $ageFilterRange['age_from'] = 46;
                $ageFilterRange['age_to'] = 50;
                break;
            case 7:
                $ageFilterRange['age_from'] = 51;
                $ageFilterRange['age_to'] = 0;
                break;
        }
        return $ageFilterRange;
    }

    function getPriceRangeFilter($priceFilter) {

        $pricefilterRange = array();

        switch ($priceFilter) {
            case 1:
                $pricefilterRange['price_from'] = 0;
                $pricefilterRange['price_to'] = 500;
                break;
            case 2:
                $pricefilterRange['price_from'] = 501;
                $pricefilterRange['price_to'] = 1000;
                break;
            case 3:
                $pricefilterRange['price_from'] = 1001;
                $pricefilterRange['price_to'] = 2000;
                break;
            case 4:
                $pricefilterRange['price_from'] = 2001;
                $pricefilterRange['price_to'] = 3000;
                break;
            case 5:
                $pricefilterRange['price_from'] = 3001;
                $pricefilterRange['price_to'] = 4000;
                break;
            case 6:
                $pricefilterRange['price_from'] = 4001;
                $pricefilterRange['price_to'] = 5000;
                break;
            case 7:
                $pricefilterRange['price_from'] = 5001;
                $pricefilterRange['price_to'] = 0;
                break;
        }
        return $pricefilterRange;
    }

    function getExpFilter($expFilter) {

        $agefilterRange = array();

        switch ($expFilter) {
            case 1:
                $agefilterRange['exp_from'] = 1;
                $agefilterRange['exp_to'] = 3;
                break;
            case 2:
                $agefilterRange['exp_from'] = 4;
                $agefilterRange['exp_to'] = 7;
                break;
            case 3:
                $agefilterRange['exp_from'] = 8;
                $agefilterRange['exp_to'] = 11;
                break;
            case 4:
                $agefilterRange['exp_from'] = 12;
                $agefilterRange['exp_to'] = 15;
                break;
            case 5:
                $agefilterRange['exp_from'] = 16;
                $agefilterRange['exp_to'] = 19;
                break;
            case 6:
                $agefilterRange['exp_from'] = 20;
                $agefilterRange['exp_to'] = 23;
                break;
            case 7:
                $agefilterRange['exp_from'] = 24;
                $agefilterRange['exp_to'] = 0;
                break;
        }
        return $agefilterRange;
    }

    function save_profile($data) {

        $this->db->where('user_id', $data['user_id']);
        $query = $this->db->get('users_profile');

        if ($query->num_rows() > 0) {

            if (isset($data['views'])) {
                $row = $query->row();
                ;
                $viewData['views'] = $row->views + 1;
                $this->db->where('user_id', $data['user_id']);
                $this->db->update('users_profile', $viewData);
            } else {
                $this->db->where('user_id', $data['user_id']);
                $this->db->update('users_profile', $data);
            }
        } else {
            $this->db->insert('users_profile', $data);
        }
    }

}

?>
