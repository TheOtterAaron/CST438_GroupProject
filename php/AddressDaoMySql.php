<?php

    require_once("iAddressDao.php");

    class AddressDaoMySql implements iAddressDao
    {
        private $m_dbCon;

        public function __construct($dbCon)
        {
            $this->m_dbCon = $dbCon;
        }

        public function getAddress($addressId)
        {
            $sql = "SELECT * FROM address WHERE addressId = :addressId";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":addressId" => $addressId
            ));
            $address = $stmt->fetch();

            if (!empty($address))
            {
                return new Address(
                    $address['addressId'],
                    $address['addressLine1'],
                    $address['addressLine2'],
                    $address['city'],
                    $address['state'],
                    $address['zip']
                );
            }
            
            return new Address(-1, "", "", "", "", 0);
        }

        public function getAddresses($addressIds)
        {
            return array(
                new Address(-1, "", "", "", "", 0),
                new Address(-1, "", "", "", "", 0),
                new Address(-1, "", "", "", "", 0)
            );
        }

        public function addAddress($address)
        {
            $sql = "INSERT INTO address
                    (addressId, addressLine1, addressLine2, city, state, zip)
                    VALUES
                    (NULL, :addressLine1, :addressLine2, :city, :state, :zip)";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":addressLine1" => $address->getAddressLine1(),
                ":addressLine2" => $address->getAddressLine2(),
                ":city" => $address->getCity(),
                ":state" => $address->getState(),
                ":zip" => $address->getZip()
            ));

            return new Address(
                $this->m_dbCon->lastInsertId(),
                $address->getAddressLine1(),
                $address->getAddressLine2(),
                $address->getCity(),
                $address->getState(),
                $address->getZip()
            );
        }

        public function updateAddress($address)
        {
            try
            {
                $sql = "UPDATE address
                        SET addressLine1 = :addressLine1,
                            addressLine2 = :addressLine2,
                            city = :city,
                            state = :state,
                            zip = :zip
                        WHERE addressId = :addressId";
                $stmt = $this->m_dbCon->prepare($sql);
                $stmt->execute(array(
                    ":addressId" => $address->getAddressId(),
                    ":addressLine1" => $address->getAddressLine1(),
                    ":addressLine2" => $address->getAddressLine2(),
                    ":city" => $address->getCity(),
                    ":state" => $address->getState(),
                    ":zip" => $address->getZip()
                ));
            }
            catch (Exception $e)
            {
                return false;
            }
            
            return true;
        }

        public function deleteAddress($addressId)
        {
            $sql = "SELECT count(*) FROM address WHERE addressId = :addressId";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":addressId" => $addressId
            ));
            $count = $stmt->fetch();
            if ($count["count(*)"] == 0)
            {
                return false;
            }

            $sql = "DELETE FROM address WHERE addressId = :addressId";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":addressId" => $addressId
            ));

            return true;
        }
    }

?>