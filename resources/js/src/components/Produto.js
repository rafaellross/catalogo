import React from 'react'
import Card from 'react-bootstrap/Card'
import { Link } from 'react-router-dom'

export default function Produto(props){
    return (
    <Link to={`/produtos/${props.id}`}>
      <Card>
        <Card.Img variant="top" src={props.picture} />
        <Card.Body>
          <Card.Title>{props.title}</Card.Title>
          <Card.Text>
            {props.text}
          </Card.Text>
        </Card.Body>
      </Card>
      </Link>
    )
  }