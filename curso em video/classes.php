<?php

class ContaBanco {
    public $numConta;
    private $tipo;
    protected $dono;
    protected $saldo;
    protected $status;

    public function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta Aberta com Sucesso.</p>";
    }

    // Métodos Get
    public function getNumConta() {
        return $this->numConta;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDono() {
        return $this->dono;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getStatus() {
        return $this->status;
    }

    // Métodos Set
    public function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setDono($dono) {
        $this->dono = $dono;
    }

    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Outros métodos da classe
    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this->setSaldo(50);
        } elseif ($t == "CP") {
            $this->setSaldo(150);
        }
    }

    public function fecharConta() {
        if ($this->getSaldo() > 0) {
            echo "<p>Não é possível encerrar sua conta, saldo ainda disponível.</p>";
        } elseif ($this->getSaldo() < 0) {
            echo "<p>Você está em débito, não é possível encerrar sua conta.</p>";
        } else {
            $this->setStatus(false);
        }
    }

    public function depositar($v) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $v);
            echo "Depósito de R$$v autorizado na conta de " . $this->getDono();
        } else {
            echo "<p>Conta Fechada, Não é possível Depositar.</p>";
        }
    }

    public function sacar($v) {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $v) {
                $this->setSaldo($this->getSaldo() - $v);
                echo "Saque de R$$v autorizado na conta de " . $this->getDono();
            } else {
                echo "<p>Saldo insuficiente para saque.</p>";
            }
        } else {
            echo "<p>Não é possível sacar de uma conta Fechada.</p>";
        }
    }

    public function pagarMensal() {
        if ($this->getTipo() == "CC") {
            $v = 12;
        } elseif ($this->getTipo() == "CP") {
            $v = 20;
        }
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $v);
            echo "Desconto de Pagamento Mensal de R$$v autorizado na conta de" . $this->getDono();
        } else {
            echo "<p>Problemas com a sua Conta.</p>";
        }
    }
}

?>
