import React from 'react'
import Container from 'react-bootstrap/Container'
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Produto from './Produto'

const products = [
    {
      id: 1,
      title: "Nike Shox 4 Molas",
      text: "Nike Shox 4 Molas em diversas cores",
      picture: "https://via.placeholder.com/100x80"
    },
    {
      id: 2,
      title: "Nike Shox 4 Molas",
      text: "Nike Shox 4 Molas em diversas cores",
      picture: "https://via.placeholder.com/100x80"
    },
    {
      id: 3,
      title: "Nike Shox 4 Molas",
      text: "Nike Shox 4 Molas em diversas cores",
      picture: "https://via.placeholder.com/100x80"
    },
    {
      id: 4,
      title: "Nike Shox 4 Molas",
      text: "Nike Shox 4 Molas em diversas cores",
      picture: "https://via.placeholder.com/100x80"
    },
    {
      id: 5,
      title: "Nike Shox 4 Molas",
      text: "Nike Shox 4 Molas em diversas cores",
      picture: "https://via.placeholder.com/100x80",
      url: ""
    }
  ]


export default function Catalogo() {
    return (
        <Container>

        <Row>
          {products.map((product) => (
            <Col key={product.id} sm={12} md={4} style={{marginTop: '20px'}}>
              <Produto {...product}/>
            </Col>
          ))}
        </Row>
      </Container>
    )
}
