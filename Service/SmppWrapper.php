<?php

namespace Kronas\SmppClientBundle\Service;

use Kronas\SmppClientBundle\Encoder\GsmEncoder;
use Kronas\SmppClientBundle\SMPP;
use Kronas\SmppClientBundle\SmppCore\SmppAddress;
use Kronas\SmppClientBundle\Transport\TransportInterface;
use Kronas\SmppClientBundle\SmppCore\SmppClient;

/**
 * Class SmppWrapper
 */
class SmppWrapper
{
    /** @var TransportInterface */
    private $transport;
    /** @var SmppClient */
    private $smpp;

    /**
     * @param TransportInterface $transport
     * @param string             $userName
     * @param string             $password
     * @param array              $debug
     */
    public function __construct(TransportInterface $transport, $userName, $password, array $debug)
    {
        $this->transport = $transport;

        $this->smpp = new SmppClient($this->transport);

        $this->smpp->debug = $debug['smpp'];
        $this->transport->debug = $debug['transport'];

        $this->transport->open();
        $this->smpp->bindTransmitter($userName, $password);
    }

    /**
     * @param string $to
     * @param string $message
     *
     * @return string|void`
     */
    public function send($to, $message)
    {
        $message = GsmEncoder::utf8_to_gsm0338($message);
        $from = new SmppAddress('Ganzhelo', SMPP::TON_ALPHANUMERIC);
        $to = new SmppAddress(intval($to), SMPP::TON_INTERNATIONAL, SMPP::NPI_E164);

        return $this->smpp->sendSMS($from, $to, $message);
    }
} 